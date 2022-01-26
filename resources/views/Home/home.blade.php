@extends('master')
@section("content")

<div>
  
</div>
<div class="custom-product">

  <!--add carousel-->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-ride="2000">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
            @foreach ($products as $element)

            <div class="carousel-item {{$element['id']==1?'active':''}}">
                <a href="details/{{ $element['id'] }}">
                  <img class="slider-image" src="{{ $element['gallery']}}" alt="">
                
                <div class="carousel-caption slider-text">
                    <h3>{{ $element['name'] }}</h3>
                   <p>{{ $element['description']}}</p>
                </div>
                </a>

            </div>
                
            @endforeach
          
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!--end carousel-->

      <!--add some product-->

      <div class="trending-wrapper">
        <h3>Trending Products</h3>
        @foreach ($products as $element)

        <div class="trending-item">
          <a href="details/{{ $element['id'] }}">
            <img class="trending-image" src="{{ $element['gallery']}}" alt="">
          
          <div class="trending-text">
              <h3>{{ $element['name'] }}</h3>
          </div>
          </a>

      </div>

      @endforeach

      </div>
    
</div>

@endsection