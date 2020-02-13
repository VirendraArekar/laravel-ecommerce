@extends('includes.index')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url({{url('img/bg-img/breadcumb.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Products</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Catagories</h6>

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#clothing">
                                        <a href="#">clothing</a>
                                        <ul class="sub-menu collapse active" id="clothing">
                                            <li><a href="{{url('product')}}">All</a></li>
                                            <li><a href="{{url("search/Bodysuits")}}">Bodysuits</a></li>
                                            <li><a href="{{url("search/Dresses")}}">Dresses</a></li>
                                            <li><a href="{{url("search/Hoodies &amp; Sweats")}}">Hoodies &amp; Sweats</a></li>
                                            <li><a href="{{url("search/Jackets &amp; Coats")}}">Jackets &amp; Coats</a></li>
                                            <li><a href="{{url("search/Jeans")}}">Jeans</a></li>
                                            <li><a href="{{url("search/Pants &amp; Leggings")}}">Pants &amp; Leggings</a></li>
                                            <li><a href="{{url("search/Rompers &amp; Jumpsuits")}}">Rompers &amp; Jumpsuits</a></li>
                                            <li><a href="{{url("search/Shirts &amp; Blouses")}}">Shirts &amp; Blouses</a></li>
                                            <li><a href="{{url("search/Sweaters &amp; Knits")}}">Sweaters &amp; Knits</a></li>
                                        </ul>
                                    </li>
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#accessories" class="collapsed">
                                        <a href="#">accessories</a>
                                        <ul class="sub-menu collapse" id="accessories">
                                            <li><a href="{{url('product')}}">All</a></li>
                                            <li><a href="{{url("search/Bodysuits")}}">Bodysuits</a></li>
                                            <li><a href="{{url("search/Dresses")}}">Dresses</a></li>
                                            <li><a href="{{url("search/Hoodies &amp; Sweats")}}">Hoodies &amp; Sweats</a></li>
                                            <li><a href="{{url("search/Jackets &amp; Coats")}}">Jackets &amp; Coats</a></li>
                                            <li><a href="{{url("search/Jeans")}}">Jeans</a></li>
                                            <li><a href="{{url("search/Pants &amp; Leggings")}}">Pants &amp; Leggings</a></li>
                                            <li><a href="{{url("search/Rompers &amp; Jumpsuits")}}">Rompers &amp; Jumpsuits</a></li>
                                            <li><a href="{{url("search/Shirts &amp; Blouses")}}">Shirts &amp; Blouses</a></li>
                                            <li><a href="{{url("search/Sweaters &amp; Knits")}}">Sweaters &amp; Knits</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget color mb-50">
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Color</p>
                            <div class="widget-desc">
                                <ul class="d-flex">
                                    @foreach($colors as $color)
                                <li><a href="{{url("search/$color->name")}}" style="background-color:{{$color->name}};" class="red"></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget brands mb-50">
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Brands</p>
                            <div class="widget-desc">
                                <ul>
                                    @foreach($brands as $brand)
                                      <li><a href="{{url("search/$brand->name")}}">{{$brand->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                      <p><span>{{count($products)}}</span> products found</p>
                                    </div>
                                    <!-- Sorting -->
                                    <div class="product-sorting d-flex">
                                        <p>Sort by:</p>
                                        <form action="#" method="get">
                                            <select name="select" id="sortByselect">
                                                <option value="value">Highest Rated</option>
                                                <option value="value">Newest</option>
                                                <option value="value">Price: $$ - $</option>
                                                <option value="value">Price: $ - $$</option>
                                            </select>
                                            <input type="submit" class="d-none" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @if(count($products) > 0)
                               @foreach($products as $product)
                               <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="single-product-wrapper">
                                        <!-- Product Image -->
                                        <div class="product-img">
                                            <?php $i=0; ?>
                                            @foreach(json_decode($product->images) as $image)
                                            <?php $i++; ?>
                                            <img class="{{ $i==2 ? 'hover-img' : '' }}" src="{{$image}}" alt="">
                                            @endforeach
                                            <!-- Product Badge -->
                                            <div class="product-badge offer-badge">
                                                <span>-30%</span>
                                            </div>
                                            <!-- Favourite -->
                                            <div class="product-favourite">
                                            <a href="#" class="favme fa fa-heart" id="favorite" data-id="{{$product->sku}}"></a>
                                            </div>
                                        </div>

                                        <!-- Product Description -->
                                        <div class="product-description">
                                            <span>
                                                @foreach($brands as $brand)
                                                {{  $brand->id == $product->brand ? $brand->name : '' }}
                                                @endforeach
                                            </span>
                                            <a href="single-product-details.html">
                                              <h6>{{$product->name}}</h6>
                                            </a>
                                        <p class="product-price"><span class="old-price">$75.00</span> {{ $product->price}}</p>

                                            <!-- Hover Content -->
                                            <div class="hover-content">
                                                <!-- Add to Cart -->
                                                <div class="add-to-cart-btn">
                                                <a href="{{ url('product/'.$product->sku)}}" class="btn essence-btn">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        {{-- <ul class="pagination mt-50 mb-70">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">21</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul> --}}
                        {{ $products->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->
@endsection
