@extends('includes.index')
@section('content')
   <!-- ##### Single Product Details Area Start ##### -->
   <section class="single_product_details_area d-flex align-items-center">

    <!-- Single Product Thumb -->
    <div class="single_product_thumb clearfix">
        <div class="product_thumbnail_slides owl-carousel">
            @foreach(json_decode($product->images) as $image)
             <img src="{{$image}}" alt="" height="20%">
            @endforeach

        </div>
    </div>

    <!-- Single Product Description -->
    <div class="single_product_desc clearfix">
        <span>
            @foreach($brands as $brand)
              @if($product->brand == $brand->id)
                {{ $brand->name }}
              @endif
            @endforeach
        </span>
        <a href="cart.html">
          <h2>{{$product->name}}</h2>
        </a>
         <p class="product-price"><span class="old-price">$65.00</span> {{ $product->price}}</p>
         <p class="product-desc">{{ $product->description}}</p>
        <!-- Form -->
        <form class="cart-form clearfix" method="post" action="{{ url('cart')}}">
            @csrf
            <!-- Select Box -->
            <div class="select-box d-flex mt-50 mb-30">
                <select name="size" id="productSize" class="mr-5">
                    @foreach($sizes as $size)
                      @foreach(json_decode($product->size) as $psize)
                         @if($size->id == $psize)
                           <option value="{{ $psize}}">Size: {{$size->name}}</option>
                         @endif
                      @endforeach
                    @endforeach

                </select>
                <select name="color" id="productColor">
                    @foreach($colors as $color)
                      @foreach(json_decode($product->color) as $pcolor)
                         @if($color->id == $pcolor)
                           <option value="{{ $pcolor}}">Color: {{$color->name}}</option>
                         @endif
                      @endforeach
                    @endforeach
                </select>
            </div>
            <!-- Cart & Favourite Box -->
            <div class="cart-fav-box d-flex align-items-center">
                <!-- Cart -->

            <button type="submit" name="addtocart" value="{{$product->sku}}" class="btn essence-btn">Add to cart</button>
                <!-- Favourite -->
                <div class="product-favourite ml-4">
                    <a href="#" class="favme fa fa-heart"></a>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- ##### Single Product Details Area End ##### -->
@endsection
