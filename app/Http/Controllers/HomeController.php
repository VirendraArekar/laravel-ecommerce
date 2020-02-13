<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Cart;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $dresses = Product::where('type','womans')->where('tags','LIKE',"%dress%")->take(6)->get();
        // dd($dresses);
        $sizes = Size::all();
        $colors = Color::all();
        $categories = Category::all();
        $brands = Brand::all();

        return view('index',compact('brands','categories','colors','sizes','dresses'));
    }
}
