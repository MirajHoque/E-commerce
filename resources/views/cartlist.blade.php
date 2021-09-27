@extends('master')
@section("content")

<div class="custom-product">

         <div class="trending-wrapper">
             <h4 class="mb-4">Results for products</h4>
             <a href="/ordernow" class="btn btn-success">Order Now</a>
             <br><br>

             @foreach ($products as $element)
             <div class="row searched-item cart-list-divider">
                 <div class="col-sm-3 col-md-4 col-lg-4">
                    <a href="detail/{{ $element->id }}">
                        <img class="cart-image img-fluid" src="{{ $element->gallery}}" alt="">
                    </a>
                 </div>

                 <div class="col-sm-4 col-md-6 col-lg-6">
                    <div>
                        <h2>{{ $element->name}}</h2>
                        <h5>{{ $element->description }}</h5>
                    </div>
                 </div>

                 <div class="col-sm-3 col-md-2 col-lg-2">
                    <a href="/removecart/{{ $element->cart_id}}" class="btn btn-warning">Remove Item</a>
                 </div>
                
                 
             </div>
                 
             @endforeach
         </div>

         <a href="/ordernow" class="btn btn-success">Order Now</a>
             <br><br>


@endsection
             
</div>


