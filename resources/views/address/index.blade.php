@extends('includes.index')
@section('content')
    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>

                    <form action="{{url('payment')}}" method="post" name="checkout">
                        @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">First Name <span>*</span></label>
                                    <input type="text" class="form-control" id="first_name"
                                    name="first_name" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Last Name <span>*</span></label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"  value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="country">Country <span>*</span></label>
                                    <select class="w-100" id="country" name="country" >
                                        <option value="usa">United States</option>
                                        <option value="uk">United Kingdom</option>
                                        <option value="ger">Germany</option>
                                        <option value="fra">France</option>
                                        <option value="ind">India</option>
                                        <option value="aus">Australia</option>
                                        <option value="bra">Brazil</option>
                                        <option value="cana">Canada</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                    <input type="text" class="form-control mb-3"  name="street_address" id="street_address" value="">
                                    <input type="text" class="form-control" name="street_address2"  id="street_address2" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="postcode">Postcode <span>*</span></label>
                                    <input type="text" class="form-control" id="postcode"  name="postcode" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="city">Town/City <span>*</span></label>
                                    <input type="text" class="form-control" id="city" value="" name="city" >
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input type="number" class="form-control" id="phone_number"  name="phone_number" min="0" value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" class="form-control" id="email_address"  name="email_address" value="">
                                </div>

                                <div class="col-12">
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Terms and conitions</label>
                                    </div>
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Create an accout</label>
                                    </div>
                                    <div class="custom-control custom-checkbox d-block">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">Subscribe to our newsletter</label>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Product</span> <span>Total</span></li>

                            @foreach($carts as $cart)
                            <li>
                                <span>{{ $cart->name}}</span> <span>${{$cart->total}}</span>
                            </li>
                            @endforeach
                            <li><span>Subtotal</span> <span>${{$total}}</span></li>
                            <li><span>Shipping</span> <span>Free</span></li>
                            <li><span>Discount</span> <span>10%</span></li>
                            <li><span>Total</span> <span>${{$final_price}}</span></li>
                            <input type="text" name="amount" id="amount"  value="{{$final_price}}" hidden>
                        </ul>

                        <div style="font-size:18px;margin-bottom:10px;">
                           <div class="justify-content-center mb-3">
                            <input class="text-center" type="radio" id="payment" name="payment" value="paypal"> PAYPAL
                           </div>
                           <div class="justify-content-center">
                            <input class="text-center" type="radio" id="payment" name="payment" value="cash_on_delivery" checked> CASH ON DELIVERY
                           </div>
                        </div>
                        <button type="submit" class="btn essence-btn">Place Order</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
@endsection
