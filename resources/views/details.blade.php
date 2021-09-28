@extends('master')
@section("content")

<div class="container mt-4">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <img class="details-image mt-5 mb-3" src="{{ $product['gallery'] }}" alt="">
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <h2>{{ $product['name'] }}</h2>
            <h3>Price: {{ $product['price'] }}</h3>
            <h4>Details: {{ $product['description'] }}</h4>
            <h5>Category: {{ $product['category'] }}</h5>
            <br><br>
            <form action="/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                <button class="btn btn-primary">Add to Cart</button>
            </form>
            <br><br>
        </div>
    </div>
    @endsection
</div>
