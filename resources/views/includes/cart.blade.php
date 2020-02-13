<!-- ##### Right Side Cart Area ##### -->
<div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">

    <!-- Cart Button -->
    <div class="cart-button">
    <a href="#" id="rightSideCart"><img src="{{url('img/core-img/bag.svg')}}" alt="">
            <span>
                @if(Auth::user())
                  <?php $count = DB::table('carts')->where('user_id',Auth::id())->count();
                  echo $count;
                  ?>
                @else
                  0
                @endif
            </span>
        </a>
    </div>

    <div class="cart-content d-flex">

        <!-- Cart List Area -->
        <div class="cart-list">
            <?php
            $brands = DB::table('brands')->get();
            $sizes = DB::table('sizes')->get();
            $colors = DB::table('colors')->get();
            $subtotal = 0;
            ?>
            @if(Auth::user())
            <?php $carts = DB::table('carts')->selectRaw('name,price,color,brand,images,size,price * qty as total')->where('user_id',Auth::id())->get();

            ?>
              @if($carts)
               @foreach($carts as $cart)
               <div class="cart-list" tabindex="2" style="overflow: hidden; outline: none;">
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                     <img src="{{json_decode($cart->images)[0]}}" class="cart-thumb" alt="">
                        <div class="cart-item-desc">
                            <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">
                                @foreach($brands as $brand)
                                  @if($brand->id == $cart->brand)
                                    {{$brand->name}}
                                  @endif
                                @endforeach
                            </span>
                            <h6>{{$cart->name}}</h6>
                            <p class="size">Size:
                                @foreach($sizes as $size)
                                  @if($size->id == $cart->size)
                                    {{$size->name}}
                                  @endif
                                @endforeach
                            </p>
                            <p class="color">Color:
                                @foreach($colors as $color)
                                  @if($color->id == $cart->color)
                                    {{$color->name}}
                                  @endif
                                @endforeach
                            </p>
                            <p class="price">${{$cart->price}}</p>
                        </div>
                    </a>
                </div>

                </div>
                <?php $subtotal += $cart->total; ?>
               @endforeach
              @else
                <div class="h-100 bg-muted">

                </div>
              @endif
            @else
            <div class="h-100 bg-secondary">

            </div>
            @endif
        </div>

        <!-- Cart Summary -->
        <div class="cart-amount-summary">
                @if($subtotal)
                  <h2 class="text-center">Summary</h2>
                @else
                <img src="{{url('img/core-img/bag.svg')}}" alt="">
                @endif
            @if($subtotal)
            <ul class="summary-table">
                <li><span>subtotal:</span> <span>${{$subtotal}}</span></li>
                <li><span>delivery:</span> <span>Free</span></li>
                <li><span>discount:</span> <span>-10%</span></li>
                <li><span>total:</span>
                    <span>$
                        <?php
                          $total = $subtotal - ($subtotal * 10/100);
                          echo $total;
                        ?>
                    </span>
                </li>
            </ul>
            @else
              <h4 class="text-center text-primary mt-3">Cart is empty</h4>
            @endif
            @if($subtotal)
               <div class="checkout-btn mt-100">
                <a href="{{url('address')}}" class="btn essence-btn">check out</a>
               </div>
            @endif
        </div>
    </div>
</div>
<!-- ##### Right Side Cart End ##### -->
