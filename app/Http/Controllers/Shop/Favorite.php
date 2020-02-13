<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Favorite as Like;
use Carbon\Carbon;
use App\Models\Favorite as Wishlist;
use App\Models\Size;
use App\Models\Color;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use Log;
use Auth;
use DB;

class Favorite extends Controller
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
       $wishlist = Wishlist::where('user_id',Auth::id())->get();
       $favorites = [];
       if($wishlist){
           foreach($wishlist as $list){
               $product = Product::where('sku',$list->sku)->first();
               if($product){
                $product['id'] = $list->id;
                array_push($favorites,$product);
               }
           }
       }

       return view('favorite.index', compact('favorites','sizes','colors','categories','brands'));
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
        //
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
            $result = Wishlist::where('user_id','=',$user_id)->where('id','=',$id)->delete();

            if($result){
                return response()->json(['success' => true, 'code' => 202,'message' => 'Wishlist item deleted successfully']);
            }else{
                return response()->json(['success' => false, 'code' => 504,'message' => 'Intenel server error']);
            }
        }
        else{

        }
    }

    // like and unlike product
    public function like(Request $request)
    {
        Log::info($request->all());
        $sku = $request->sku;
        $action = $request->action;
        $user_id = Auth::id();
        if($action == 'like'){
           if(Auth::user()){
               $like = Like::where('user_id',$user_id)->where('sku', $sku)->first();
               if(!$like){
                Like::create(['user_id' => $user_id,'sku' => $sku,'created_at'=> Carbon::now(),'updated_at' => Carbon::now()]);
               }
               return response()->json(['success'=> true,'code' => 202,'message' => 'Product add to favorite list.']);
           }
        }
        else if($action ="unlike"){
            if(Auth::user()){
                $like = Like::where('user_id',$user_id)->where('sku',$sku)->first();
               if($like){
                 Like::where('sku','=',$sku)->where('user_id' ,$user_id)->delete();
               }
                return response()->json(['success'=> true,'code' => 202,'message' => 'Product add to favorite list.']);
            }
        }
    }

    public function addtocart()
    {

       $wishlist = Wishlist::where('user_id',Auth::id())->get();

       $favorites = [];
       if($wishlist){
           foreach($wishlist as $list){
               $product = Product::where('sku',$list->sku)->first();
               if($product){
                $product['user_id'] = $list->user_id;
                $product['color'] = 1;
                $product['size'] = 1;
                $product['brand'] = 1;
                $product['qty'] = 1;
                unset($product['id']);
                $proarray = json_decode(json_encode($product), true);
                array_push($favorites,$product);
                DB::table('carts')->insert($proarray);

               }
           }
       }

       Wishlist::where('user_id',Auth::id())->delete();
     return redirect()->url('cart');

    }
}
