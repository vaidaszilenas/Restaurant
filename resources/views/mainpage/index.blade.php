@extends('layouts.app', [
  'title'=>'Index'
])
@section('content')



    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        @foreach ($dishes as $dish)
          <div class="item{{ $loop->index == 0 ? ' active' : ''}}">
            <img src="{{ $dish->getUrlAttribute() }}" alt="Los Angeles" class="img-responsive" style="width: 100%; height: 450px">
          </div>
        @endforeach

      </div>


      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  <div class="container">
    @foreach ($dishes as $dish)
      <ul class="list-group col-md-4" style="padding-left: 15px; padding-top: 30px">
        <li class="list-group-item list-group-item-successs">{{$dish['title']}}</li>
        <li class="list-group-item">
          <a href="#">
            <img src="{{ $dish->getUrlAttribute() }}" alt="" class="img-responsive">
          </a>
        </li>
        <li class="list-group-item">{{$dish['description']}}</li>
        <li class="list-group-item">{{$dish['price']}}</li>
      </ul>
    @endforeach
    <a
    href="{{route('dishes-admin')}}"
    class="btn btn-primary ">
    Show more dishes
    </a>
</div>


@endsection
