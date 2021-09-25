<?php
  
  $vat = $totalAmount * 5/100;
  $deliveryCharge = 10;
  $subTotal= $totalAmount + $deliveryCharge + $vat;
  

?>
@extends('master')
@section("content")


<div class="custom-product">
    
    <table class="table">

        <tbody>
          <tr>
            <td>Amount</td>
            <td>$ {{ $totalAmount }}</td>
          </tr>
          <tr>
            <td>Vat(5%)</td>
            <td>$ {{ $vat }}</td>
          </tr>
          <tr>
            <td>Delivery Charge</td>
            <td>$ {{ $deliveryCharge }}</td>
          </tr>
          <tr>
            <td>Sub Total</td>
            <td>$ {{ $subTotal }}</td>
          </tr>
        </tbody>
      </table>

      <div class="mt-4">
        
          <form action="/action_page.php">
            <div class="form-group">
              <textarea type="email" class="form-control" name="" placeholder="Enter your address"></textarea>
            </div>
            <div class="form-group">
              <label for="pwd">Payment Method</label> <br> <br>
              <input type="radio" name="payment"> <span>Online Payment</span> <br> <br>
              <input type="radio" name="payment"> <span>EMI Payment</span> <br> <br>
              <input type="radio" name="payment"> <span>Payment on Delivery</span> <br> <br>
            </div>
            <button type="submit" class="btn btn-default">Order Now</button>
          </form>
      </div>

</div>



@endsection