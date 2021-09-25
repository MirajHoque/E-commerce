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
        
          <form action="/placedorder" method="POST">
            @csrf
            <div class="form-group">
              <textarea  class="form-control" name="address" placeholder="Enter your address" required></textarea>
            </div>
            <div class="form-group">
              <label for="pwd">Payment Method</label> <br> <br>
              <input type="radio" class=" ml-3 " value="cash" name="payment" required> <span>Online Payment</span> <br> <br>
              <input type="radio" class=" ml-3 " value="cash" name="payment" required> <span>EMI Payment</span> <br> <br>
              <input type="radio" class="ml-3" value="cash"name="payment" required> <span>Payment on Delivery</span> <br> <br>
            </div>
            <button type="submit" class="btn ml-3 btn-success">Placed Order</button>
          </form>
      </div>

</div>



@endsection