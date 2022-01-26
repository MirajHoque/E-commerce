<?php
  use App\Http\Controllers\ProductController;
  use App\Http\Controllers\CartController;

  $total = 0;
  if(Session::has('user')){
    $total = CartController::cartItem();
  }
  

?>

<style>
  .search-box{
    padding-left: 200px;
  }
  .orders{
    margin-right: 70px;
  }
  .search{
    margin-right: 375px;
  }
</style>

<nav class="navbar navbar-expand-sm navbar-light bg-light">
  <a class="nav-link font-weight-bold" href="/">CartEye</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
      <li class="nav-item"><a class="nav-link orders" href="/myorders">Oders</a></li>
    </ul>

    <form action="/search" class="form-inline navbar-form navbar-left">
      <div class="form-group">
        <input type="text" name="query" class="form-control mr-sm-2 search-box" placeholder="Search">
        <button type="submit" class="btn btn-outline-success search">Search</button>
      </div>      
      
    </form>

    <ul class="navbar-nav">
      <li class="mr-2 nav-item">
        <span><i class="fas fa-cart-arrow-down"></i></span>
      </li>
      <li class="mr-2 nav-item">
        <a href="/cartlist">cart({{ $total }})</a>
      </li>

      <!-- log in & log out --->

      @if(Session::has('user'))
       <div>
         <Span class="mr-1">{{ Session::get('user')['name'] }}</Span>
         <a href="/logout"><i class="fas fa-sign-out-alt"></i></a>
       </div>

    @else
    <a href="/login">SIGNUP/LOGIN</a>
    
    @endif
    </ul>

  </div>

  

</nav>