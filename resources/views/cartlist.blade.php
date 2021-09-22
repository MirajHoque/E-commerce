@extends('master')
@section("content")

<div class="custom-product">


     <div class="col-sm-10 col-lg-12">
         <div class="trending-wrapper">
             <h4>Results for products</h4>

             @foreach ($products as $element)
             <div class="row searched-item cart-list-divider">
                 <div class="col-sm-3 col-lg-4">
                    <a href="detail/{{ $element->id }}">
                        <img class="trending-image" src="{{ $element->gallery}}" alt="">
                    </a>
                 </div>

                 <div class="col-sm-4 col-lg-6">
                    <div>
                        <h2>{{ $element->name}}</h2>
                        <h5>{{ $element->description }}</h5>
                    </div>
                 </div>

                 <div class="col-sm-3 col-lg-2">
                    <button class="btn btn-warning">Remove Item</button>
                 </div>
                
                 
             </div>
                 
             @endforeach
         </div>
     </div>
</div>
@endsection