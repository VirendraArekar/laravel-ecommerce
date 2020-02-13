<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Address;
use App\Models\Order;
use App\Models\Transaction as Trans;
use Carbon\Carbon;

use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use Auth;

class PaymentController extends Controller
{
    private $_api_context;
    public $user_id;
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }

    public function trans_id($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return 'PAYID-'.$randomString;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        \Session::put('success','success message');

        $pay_id = \Session::get('paypal_payment_id') ? \Session::get('paypal_payment_id') : $this->trans_id(12);


        $order_method = \Session::get('checkout_info')['payment'] == 'paypal' ? 'online' : 'offline';

        if(\Session::get('success')){
            $carts = Cart::all();
            $pay_id = \Session::get('paypal_payment_id');

            foreach($carts as $cart){
                $order = new Order;
                $order->user_id = $user_id;
                $order->transid = \Session::get('paypal_payment_id') ? \Session::get('paypal_payment_id') : $this->trans_id(24);
                $order->status = 'processing';
                $order->method = $order_method;
                $order->sku = $cart->sku;
                $order->name = $cart->name;
                $order->brand = $cart->brand;
                $order->category = $cart->category;
                $order->size = $cart->size;
                $order->color = $cart->color;
                $order->price = $cart->price;
                $order->images = $cart->images;
                $order->qty = $cart->qty;
                $order->description = $cart->description;
                $order->tags = $cart->tags;
                $order->created_at = Carbon::now();
                $order->updated_at = Carbon::now();
                $order->save();
            }

            Cart::where('user_id',$user_id)->delete();

            Trans::create(['user_id'=>$user_id,'transaction_id' => \Session::get('paypal_payment_id') ? \Session::get('paypal_payment_id') : $this->trans_id(24),'amount' => \Session::get('checkout_info')['amount'],'created_at' => Carbon::now(),'updated_at' => Carbon::now()]);
        }

        return view('payment.status');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::put('checkout_info',$request->all());
        if($request->payment == 'paypal'){
            // payment code
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $item_1 = new Item();

            $item_1->setName('Item 1') /** item name **/
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($request->amount); /** unit price **/

            $item_list = new ItemList();
            $item_list->setItems(array($item_1));

            $amount = new Amount();
            $amount->setCurrency('USD')
                ->setTotal($request->amount);

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Your transaction description');

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
                ->setCancelUrl(URL::to('status'));

            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
            try {
                $payment->create($this->_api_context);
            } catch (\PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    \Session::put('error', 'Connection timeout');
                    return Redirect::to('/paymentstatus');
                } else {
                    \Session::put('error', 'Some error occur, sorry for inconvenient');
                    return Redirect::to('/paymentstatus');
                }
            }

            foreach ($payment->getLinks() as $link) {
                if ($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }

            /** add payment ID to session **/
            Session::put('paypal_payment_id', $payment->getId());
            if (isset($redirect_url)) {
                /** redirect to paypal **/
                return Redirect::away($redirect_url);
            }
            \Session::put('error', 'Unknown error occurred');
            return Redirect::to('/paymentstatus');
        }
        else{
            Session::put('success','Order placed successfully');
            return Redirect::to('/paymentstatus');
        }
    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Payment failed');
            return Redirect::to('/paymentstatus');
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            \Session::put('success', 'Payment success');
            return Redirect::to('/paymentstatus');


        }

        \Session::put('error', 'Payment failed');
        return Redirect::to('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
