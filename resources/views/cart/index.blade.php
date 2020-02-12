@extends('includes.index')
@section('content')
<div class="container-fluid"><br><br>
    <div class="card shopping-cart" style="margin-bottom:30px;">
             <div class="card-header bg-dark text-light">
                 <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                 Shipping cart
                <a href="{{url('product')}}" class="btn btn-outline-info btn-sm pull-right">Continue shopping</a>
                 <div class="clearfix"></div>
             </div>
             <div class="card-body">
                     <!-- PRODUCT -->
                     @if(count($carts) > 0)
                       @foreach($carts as $cart)
                         <div class="row" id="row-{{$cart->id}}">
                            <div class="col-12 col-sm-12 col-md-2 text-center">
                            <img class="img-responsive" src="{{ json_decode($cart->images)[0]}}" alt="prewiew" width="120" height="80">
                            </div>
                            <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong>{{ $cart->name}}</strong></h4>
                                <h4>
                                <small><?php echo mb_substr($cart->description,1,90); ?></small>
                                </h4>
                            </div>
                            <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                                <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                    <h6><strong>{{$cart->price}} <span class="text-muted">x</span></strong></h6>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <div class="quantity">
                                        <input type="button" value="+" class="plus">
                                    <input type="number" step="1" max="99" min="1" value="{{$cart->qty}}" title="Qty" class="qty" readonly
                                            size="4">
                                        <input type="button" value="-" class="minus">
                                    </div>
                                </div>
                                <div class="col-2 col-sm-2 col-md-2 text-right">
                                <button type="button" class="btn btn-outline-danger btn-xs" id="{{$cart->id}}">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <hr id="hr-{{$cart->id}}">
                       @endforeach
                     @endif
                     <!-- END PRODUCT -->

                 <div class="pull-right">
                     <a href="" class="btn btn-outline-secondary pull-right">
                         Update shopping cart
                     </a>
                 </div>
             </div>
             <div class="card-footer">
                 <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                     <div class="row">
                         <div class="col-6">
                             <input type="text" class="form-control" placeholder="cupone code">
                         </div>
                         <div class="col-6">
                             <input type="submit" class="btn btn-default" value="Use cupone">
                         </div>
                     </div>
                 </div>
                 <div class="pull-right" style="margin: 10px">
                 <a href="{{url('address')}}" class="btn btn-success pull-right">Checkout</a>
                     <div class="pull-right" style="margin: 5px; margin-right:20px;font-size:28px;">
                         Total price: <b><span id="total">
                             <?php
                             $total = 0;
                               foreach($carts as $cart){
                                  $total += $cart->qty * $cart->price;
                               }
                               echo $total;
                             ?>
                         </span>
                         </b>
                     </div>
                 </div>
             </div>
         </div>
 </div>
@endsection
