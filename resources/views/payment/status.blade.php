@extends('includes.index')
@section('content')
   <div class="container-fluid">
    @if(\Session::get('success'))
    <div class="jumbotron text-center">
        <h1 class="display-3">Thank You!</h1>
        <p class="lead"><strong>Order Placed</strong> Please check your email & sms.</p>
        <hr>
        <p class="lead"><strong>TRANSACTION ID</strong> PAY_ID-JCKD67HD3894N</p>
        <p class="lead">
        <a class="btn btn-primary btn-sm" href="{{url('/')}}" role="button">Continue Spopping</a>
        </p>
    </div>
    @elseif(\Session::get('error'))
    <div class="jumbotron text-center">
        <h1 class="display-3 text-danger">Transaction Fail!</h1>
        <p class="lead"><strong>Payment not successfull</strong> Please check try again.</p>
        <hr>
        <p class="lead text-danger"><strong>Error</strong> {{\Session::get('error')}}</p>
        <p class="lead text-danger">
        <a class="btn btn-primary btn-sm" href="{{url('/cart')}}" role="button">Back To Cart</a>
        </p>
    </div>
    @endif
   </div>

@endsection
@section('script')
   <script>
       $(function(){
          @if(\Session::get('success'))
          toastr.success("{{\Session::get('success')}}");
          @endif
          @if(\Session::get('error'))
          toastr.error("{{\Session::get('error')}}");
          @endif
       });
   </script>
@endsection
<?php
   \Session::forget(['success','error','paypal_payment_id','checkout_info']);
?>
