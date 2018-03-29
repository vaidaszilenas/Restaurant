@extends('layouts.app', [
  'title'=>'Cart'
])
@section('content')


  <div class="container">


    <div class="row" style="margin-top: 30px;">
      <h1>
        Cart ({{ $cartSize }})
      </h1>
      <hr>
  @if ($cartSize>0)
    @foreach($cart as $value)
    {{-- {{dd($value)}} --}}
      <ul class="list-group" style="padding-left: 15px; padding-top: 30px;">
        <li class="list-group-item list-group-item-success col-md-12">{{$value->dishes->title}}
        </li>
        <li class="list-group-item col-md-12" style="margin-bottom: 50px;">
          <div class="col-md-2">
            <a href="#">
              <img src="{{ $value->dishes->getUrlAttribute() }}" alt="" style="display: inline-block; width: 150px; height: 150px" class="img-responsive">
            </a>
          </div>
          <div class="col-md-9" style="display: inline-block;">{{$value->dishes->description}}</br>
            <span>Price:</span><p class="label label-success">{{$value->dishes->price}}$</p>
          </div>
          <div class="col-md-1">
            <form method="POST" action="{{ route('cart-destroy', $value->id)}}">
              {{ csrf_field() }}
              {{ method_field('delete')}}
              <button type="submit" class="btn btn-danger btn-block" name="button">DROP</button>

            </form>
            <!--
            <button class="btn btn-danger">Delete</button>-->
          </div>
        </li>
      </ul>
    @endforeach

    <hr>
      <h2>
        Sub-total:
        <p class="label label-danger pull-right">{{ $subTotal}} $</p>
      </h2>

      <h2>
        VAT:
        <p class="label label-warning pull-right"> {{ $vatTotal }} $</p>
      </h2>

      <h2>
        <strong>Total:</strong>
        <p class="label label-success pull-right">{{ $cartTotal }} $</p>
      </h2>
    @else
      <h2> Your Cart is empty. </h2>
  @endif


      <form class="form-horizontal" method="POST" action="{{route('order-cart')}}">

        {{-- {{dd($value->dishes_id)}} --}}
        {{csrf_field()}}
        <button class="btn btn-lg btn-success btn-block">
          @if ($cartSize>0)
            Checkout
          @else
            Add something
          @endif
        </button>

      </form>


  </div>

@endsection
