@extends('includes.index')
@section('content')
<div class="container-fluid"><br><br>
    @if(count($orders) > 0)
    <div class="card shopping-cart" style="margin-bottom:30px;">
             <div class="card-header bg-dark text-light">
                 <i class="fa fa-car" aria-hidden="true"></i>
                 My Orders
                <a href="{{url('product')}}" class="btn btn-outline-info btn-sm pull-right">Continue shopping</a>
                 <div class="clearfix"></div>
             </div>
             <div class="card-body">
                     <!-- PRODUCT -->
                     @if(count($orders) > 0)
                       @foreach($orders as $order)
                         <a href="{{url("product/$order->sku")}}">
                         <div class="row" id="row-{{$order->id}}">

                            <div class="col-12 col-sm-12 col-md-2 text-center">
                            <img class="img-responsive" src="{{ json_decode($order->images)[0]}}" alt="prewiew" width="120" height="80">
                            </div>
                            <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-5">
                            <h5 class="product-name"><strong>{{ $order->name}}</strong></h5>
                                <h5>
                                <small><?php echo mb_substr($order->description,1,90); ?></small>
                                </h5>
                            </div>
                            <div class="col-12 col-sm-12 text-sm-center col-md-5">
                                <div class="row">
                                    <div class="col-sm-3 col-md-6 " style="">
                                        <h6 class="text-center">Price : <strong>{{$order->price}}</strong></h6>
                                    </div>
                                    <div class="col-sm-4 col-md-6">
                                        <h6 class="text-center">Qty : <strong>{{$order->qty}}</strong></h6>
                                    </div>
                                    <div class="col-sm-4 col-md-6">
                                        <h6 class="text-center">Color : <strong>
                                            @foreach($colors as $color)
                                               @if($order->color == $color->id)
                                                 {{$color->name}}
                                               @endif
                                            @endforeach
                                        </strong>
                                        </h6>
                                    </div>
                                    <div class="col-sm-4 col-md-6">
                                        <h6 class="text-center">Brand : <strong>
                                            @foreach($brands as $brand)
                                               @if($order->brand == $brand->id)
                                                 {{$brand->name}}
                                               @endif
                                            @endforeach
                                        </strong>
                                    </h6>
                                    </div>

                                    <div class="col-sm-4 col-md-6">
                                        <h6 class="text-center">Date : <strong>{{date('d M Y',strtotime($order->created_at))}}</strong></h6>
                                    </div>
                                    <div class="col-sm-4 col-md-6">
                                        <h6 class="text-center">Status : <strong
                                            @if($order->status == 'processing')
                                            class="text-warning"
                                            @elseif($order->status == 'on the way')
                                              class="text-primary"
                                            @else
                                              class="text-success"
                                            @endif
                                        >{{$order->status}}</strong></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <hr id="hr-{{$order->id}}">
                       @endforeach
                     @endif
                     <!-- END PRODUCT -->
                    </a>

             </div>
             <div class="card-footer">

             </div>
         </div>
         @else
            <h3 class="text-center">Order Not Found</h3>
            <span class="fa fa-5x fa-car text-center"></span>
         @endif
 </div>
@endsection


