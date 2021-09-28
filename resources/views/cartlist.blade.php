@extends('master')
@section("content")

<div class="custom-product">

         <div class="trending-wrapper">
            <div class="d-inline">
                <h4 class=" pr-5 mr-5">Results for products</h4>
                <h4 class=" pl-5 ml-5 text-right">
                   <a href="/ordernow" class="btn btn-success">Order Now</a>
                </h4>
            </div>
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



@endsection
             
</div>


