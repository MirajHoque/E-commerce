<?php
  
  $deliveryCharge = 10;
  //$discount = $totalAmount * discountPercentage
  $vat = $totalAmount * 5/100;
  $subTotal= $totalAmount + $deliveryCharge + $vat;
  

?>
@extends('master')
@section("content")


<div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card mt-4 mr-5 ml-5 bg-secondary">
        <div class="card-body mt-2">
          <h2 class="card-title text-center text-primary">CartEye</h2>
          <div>
            <div class="row ">
              <div class="col-lg-12">
                <table class="table mt-4">

                  <tbody>
          
                    <tr>
                      <td>Amount</td>
                      <td class="ml-5">$ {{ $totalAmount }}</td>
                    </tr>
          
                    <tr>
                      <td>Delivery Charge</td>
                      <td class="ml-5">$ {{ $deliveryCharge }}</td>
                    </tr>

                    <tr>
                      <td>Vat(5%)</td>
                      <td class="ml-5">$ {{ $vat }}</td>
                    </tr>

                    <tr>
                      <td>Sub Total</td>
                      <td class="ml-5">$ {{ $subTotal }}</td>
                    </tr>

                  </tbody>
                </table>
          
              </div>
            </div>
          </div>

    
          <div class="mt-4">
            
              <form action="/placedorder" method="POST">
                @csrf
                
                <div class="form-group">
                  <textarea  class="form-control mb-4" name="address" placeholder="Enter your address" required></textarea>
                </div>
                <div class="form-group">
                  <label for="pwd">Payment Method</label> <br> <br>
                  <input type="checkbox" class=" ml-3 " value="cash" name="payment" required> <span>Payment on Delivery</span>
                  <input type="checkbox" class=" ml-3 " value="cash" name="payment" required> <span>Online Payment</span>
                  <input type="checkbox" class="ml-3" value="cash"name="payment" required> <span>Mobile Payment</span>
                </div>
                <button type="submit" class="btn ml-3 btn-success">Placed Order</button>
              </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection