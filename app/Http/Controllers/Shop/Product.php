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
          $products = $products->WhereRaw('json_contains(size, \'[' . $sizes->id . ']\')');
        }

        $color = Color::select('id')->where('name', 'LIKE', "%$keyword%")->first();
        if($color){
          $products = $products->orWhereRaw('json_contains(color, \'[' . $color->id . ']\')');
        }

        $category = Category::select('id')->where('name', 'LIKE', "%$keyword%")->first();

        if($category){
        //   $products = $products->orWhere('category', $category->id);
        }

        $brand = Brand::select('id')->where('name', 'LIKE', "%$keyword%")->first();

        if($brand){
        //   $products = $products->orWhere('brand', 4);
        }

        // $data = $products->orWhere('name', 'LIKE', "%$keyword%")->where('description', 'LIKE', "%$keyword%")->orWhereRaw('json_contains(tags, \'["' . $keyword . '"]\')');

        $products = $products->paginate(2);
        $sizes = Size::all();
        $colors = Color::all();
        $categories = Category::all();
        $brands = Brand::all();

       return view('product.index',compact('products','brands','categories','colors','sizes'));

    }
}
