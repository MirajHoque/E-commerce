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
            <td>Tax</td>
            <td>$ 0</td>
          </tr>
          <tr>
            <td>Delivery</td>
            <td>$ 10</td>
          </tr>
          <tr>
            <td>Sub Total</td>
            <td>$ {{ $totalAmount+10 }}</td>
          </tr>
        </tbody>
      </table>

</div>


@endsection