<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use App\Models\Cart as Bag;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\Brand;
use App\Models\Category;
use Session;
use Log;

class Cart extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();
        $colors = Color::all();
        $categories = Category::all();
        $brands = Brand::all();
        $carts = Bag::all();

        return view('cart.index',compact('carts','brands','categories','colors','sizes'));
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
       $sizes = Size::all();
       $colors = Color::all();
       $categories = Category::all();
       $brands = Brand::all();
       $product = Product::where('sku','=',$request->addtocart)->first();
        if(Auth::check()){
           $id = Auth::id();
           if($product){
              $bag = new Bag;
              $bag->user_id = $id;
              $bag->sku = $product->sku;
              $bag->name = $product->name;
              $bag->brand = $product->brand;
              $bag->category = $product->category;
              $bag->size = $request->size;
              $bag->color = $request->color;
              $bag->price = $product->price;
              $bag->images = $product->images;
              $bag->description = $product->description;
              $bag->tags = $product->tags;
              $bag->created_at = Carbon::now();
              $bag->updated_at = Carbon::now();
              $bag->save();

              $carts = Bag::all();

              return view('cart.index',compact('carts','brands','categories','colors','sizes'));

           }
           else{
            //    $product = [
            //     'user_id' =>null,
            //     'sku' => $product->sku,
            //     'name' => $product->name,
            //     'brand' => $product->brand,
            //     'category' => $product->category,
            //     'size' => $request->size,
            //     'color' => $request->color,
            //     'price' => $product->price,
            //     'images' => $product->images,
            //     'description' => $product->description,
            //     'tags' => $product->tags,
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now(),
            //    ];

            //    if(Session::has('cart')){
            //        Session::push('cart',json_encode($product));
            //        dd(Session::get('cart'));
            //    }
            //    else{
            //        Session::put('cart',[json_ecode($product)]);
            //        dd(Session::get('cart'));
            //    }


           }

        }
        else{
            // Session::forget('cart');
            $cart = [
                'sku' => $product->sku,
                'name' => $product->name,
                'brand' => $product->brand,
                'category' => $product->category,
                'size' => $request->size,
                'color' => $request->color,
                'price' => $product->price,
                'description' => $product->description,
                'tags' => $product->tags,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            if(Session::has('cart')){
                Session::push('cart',$cart);
            }
            else{
                Session::put('cart',[ $cart ]);
            }
            dd(Session::get('cart'));
        }
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
        if(Auth::user()){
            $user_id = Auth::id();
            $result = Bag::where('user_id','=',$user_id)->where('id','=',$id)->delete();

            $carts = Bag::selectRaw('qty*price as total')->get();
            $count = count($carts);
            $total = 0;
            foreach($carts as $cart){
                $total += $cart->total;
            }

            if($result){
                return json_encode(['success' => true, 'code' => 202,'total'=> $total,'count' => $count,'message' => 'cart item deleted successfully']);
            }else{
                return json_encode(['success' => false, 'code' => 504,'total'=> $total,'count' => $count,'message' => 'Intenel server error']);
            }
        }
        else{

        }
    }
}
