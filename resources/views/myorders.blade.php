@extends('master')
@section("content")

<div class="custom-product">

         <div class="trending-wrapper">
             <h4 class="mb-4">My Orders</h4>
             <br><br>

             @foreach ($orderItems as $element)
             <div class="row searched-item cart-list-divider">
                 <div class="col-sm-3 col-md-4 col-lg-4">
                    <a href="detail/{{ $element->id }}">
                        <img class="cart-image img-fluid" src="{{ $element->gallery}}" alt="">
                    </a>
                 </div>

                 <div class="col-sm-4 col-md-8 col-lg-6">
                    <div class="order-info">
                        <h2>Name : {{ $element->name}}</h2>
                        <h5>Delivery Status: {{ $element->status }}</h5>
                        <h5>Address : {{ $element->address }}</h5>
                        <h5>Payment Status: {{ $element->payment_status }}</h5>
                        <h5>Payment Method : {{ $element->payment_method }}</h5>
                    </div>
                 </div>

                
                 
             </div>
                 
             @endforeach
         </div>

         @endsection

             
</div>


