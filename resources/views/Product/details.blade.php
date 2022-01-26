@extends('master')
@section("content")

<!-- 
    product quantity css
-->
<style>
    #countItem{
    width: 45px;
    height: 30px;
    padding: 5px;
    border: none;
}
</style>
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
            <br>

            @if (Session::has('cartItem'))

            @php
            $isExitsInCart = 0;
            $x = session()->get('cartItem');
            //$id = $product['id'];
            //dd($id);
            //dd($x);
            @endphp

            @foreach ($x as $elements)
            
            @if(number_format($elements) == $product['id'])

            @php
                $isExitsInCart = $product['id'];
                //dd($isExitsInCart);
                break;
            @endphp
            
            
            @else

            @php
                $isExitsInCart = -1;
                //dd($isExitsInCart);
            @endphp

            @endif

            @endforeach

            @if ($isExitsInCart == $product['id'])

            <button onclick="#" class="btn btn-secondary">Already in Cart</button>
                
            @else

            <div>
                <input type="hidden" id="productId" name="product_id" value="{{ $product['id'] }}">
                <div id="quantity" class="mb-3">
                    <span for="qty" class= "mr-2">Quantity</span>
                    <button id="decreaseCount" type="button" class="btn border border-info"><i class="fas fa-minus-circle"></i></button>
                    <input type="number" min="1" max="120" name="countItem" id="countItem" value="1">
                    <button id="increaseCount" type="button" class="btn border border-info"><i class="fas fa-plus-circle"></i></button>
                </div>
                <button id="addToCart" onclick="addedToCart()" class="btn btn-warning">Add to Cart</button>
                <button id="alreadyInCart" onclick="#" class="btn btn-secondary">Already in Cart</button>
            </div>

            @endif

            @else

            <div>
                <input type="hidden" id="productId" name="product_id" value="{{ $product['id'] }}">
                <div id="quantity" class="mb-3">
                    <span for="qty" class= "mr-2">Quantity</span>
                    <button id="decreaseCount" type="button" class="btn border border-info"><i class="fas fa-minus-circle"></i></button>
                    <input type="number" min="1" max="120" name="countItem" id="countItem" value="1">
                    <button id="increaseCount" type="button" class="btn border border-info"><i class="fas fa-plus-circle"></i></button>
                </div>
                <button id="addToCart" onclick="addedToCart()" class="btn btn-warning">Add to Cart</button>
                <button id="alreadyInCart" onclick="#" class="btn btn-secondary">Already in Cart</button>
            </div>

            @endif


            <br><br>
        </div>
    </div>

    <script>
        //hide element
        $("#alreadyInCart").hide();
        $("#addToCart").show();
        
        $("#increaseCount").click(function () { 
            let value = $("#countItem").val();
           // console.log(value);
            let updatedValue = parseInt(value) + 1;
            $("#countItem").val(updatedValue);
            
        });

        $("#decreaseCount").click(function () { 
            let value = $("#countItem").val();
            //console.log(value);

            let updatedValue = parseInt(value) - 1;
            if(updatedValue < 1){
                let finalValue = updatedValue.replace(/[^1-100]/g, '1');
                $("#countItem").val(finalValue);
            }
           else
            $("#countItem").val(updatedValue);
            
        });

        //sweetalert2
       var alertMsg = Swal.mixin({
            toast: true,
            position: 'top-end',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
          })

        //ajax setup  
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function addedToCart(){
            var product = $("#productId").val();;
            var val = $("#countItem").val();
            var unit = parseInt(val);
            $.ajax({
                type: "POST",
                url: "/addtocart",
                data: {product: product, unit: unit},
                dataType: "json",
                success: function (response){
                    $("#alreadyInCart").show();
                    $("#addToCart").hide();
                        alertMsg.fire({
                            title: 'Product added to Cart'
                        });
                        console.log('added');
                    
                },
                error: function (err){
                    window.location = err.responseJSON.redirect_uri
                }
            });
        }
        
    
    </script>
    @endsection
</div>

