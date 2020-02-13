<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Product as Products;
use App\Models\Size;
use App\Models\Color;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Cart;
use DB;

class Product extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products = Products::paginate(6);
       $sizes = Size::all();
       $colors = Color::all();
       $categories = Category::all();
       $brands = Brand::all();

       return view('product.index',compact('products','brands','categories','colors','sizes'));
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
       $product = Products::where('sku','=',$id)->first();
       $sizes = Size::all();
       $colors = Color::all();
       $categories = Category::all();
       $brands = Brand::all();

       return view('product.detail',compact('product','brands','categories','colors','sizes'));
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

    public function search($keyword)
    {
        $products = Products::query();
        $sizes = Size::select('id')->where('name', 'LIKE', "%$keyword%")->first();
        if($sizes){
          $products = $products->where('size',$size->id);
        }

        $color = Color::select('id')->where('name', 'LIKE', "%$keyword%")->first();
        if($color){
          $products = $products->where('color',$color->id);
        }

        $category = Category::select('id')->where('name', 'LIKE', "%$keyword%")->first();

        if($category){
          $products = $products->where('category',$category->id);
        }

        $brand = Brand::select('id')->where('name', 'LIKE', "%$keyword%")->first();

        if($brand){
          $products = $products->where('brand',$brand->id);
        }

        $products = $products->orWhere('name', 'LIKE', "%$keyword%")->orWhere('tags', 'LIKE',"%$keyword%");

        $products = $products->paginate(2);
        $sizes = Size::all();
        $colors = Color::all();
        $categories = Category::all();
        $brands = Brand::all();

       return view('product.index',compact('products','brands','categories','colors','sizes'));

    }

    public function categorysearch(Request $request,$type,$tags,$start = 0, $end = 0)
    {
        $thirdparameter = '';
        $sizes = Size::all();
        $colors = Color::all();
        $categories = Category::all();
        $brands = Brand::all();

        if(\Request::segment(3) != null){
          $thirdparameter = \Request::segment(3);
        }
        $products = Products::where('tags','LIKE', "%$tags%")->where('type',$type);
        if($thirdparameter){
            $products = $products->orWhere('name','LIKE',"%$thirdparameter%");
            foreach($colors as $color){
                if($color->name == $thirdparameter)
                {
                    $products = $products->where('color',$color->id);
                }
            }
            foreach($brands as $brand){
                if($brand->name == $thirdparameter)
                {
                    $products = $products->where('brand',$brand->id);
                }
            }
        }

        $products = $products->paginate(6);


        return view('product.index',compact('products','brands','categories','colors','sizes'));
    }
}
