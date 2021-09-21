<?php
  use App\Http\Controllers\ProductController;

  $total = 0;
  if(Session::has('user')){
    $total = ProductController::cartItem();
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
  <a class="nav-link" href="/">E-Commerce</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
      <li class="nav-item"><a class="nav-link orders" href="#">Oders</a></li>
    </ul>

    <form action="/search" class="form-inline navbar-form navbar-left">
      <div class="form-group">
        <input type="text" name="query" class="form-control mr-sm-2 search-box" placeholder="Search">
      </div>      
      <button type="submit" class="btn btn-outline-success search">Search</button>
    </form>

    <ul class="navbar-nav">
      <li class=" mr-3 nav-item"><a href="#">cart({{ $total }})</a></li>

      <!-- log in dropdown--->

      @if(Session::has('user'))
          
        
      <div>
        <li class="dropdown">
          <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Session::get('user')['name'] }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/logout">Log Out</a>
          </div>
         </li>
      </div>

    @else
    <a href="/login">Log In</a>
    
    @endif
    </ul>

  </div>

  

</nav>