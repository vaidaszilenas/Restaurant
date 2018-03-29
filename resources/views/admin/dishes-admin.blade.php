@extends('layouts.app', [
  'title'=>'Dishes'
])
@section('content')


<div class="container" style="margin-top: 50px;">
  <div class="row">
      <div class="col-md-12" style="padding-left:0;">
  <h2 class="text-center alert alert-info alert-dismissable fade in">Dish total: ({{$dishes->total()}})</h2>
  @if (Auth::check() && !Auth::user()->isAdmin())
    <h2 class="text-center">Menu</h2>
  @elseif (!Auth::check())
    <h3 class="text-center">Please sign in</h3>
  @elseif  (Auth::user()->isAdmin())

                 <a
              	   href="{{ route('dishes-create')}}"
              	   class="btn btn-lg btn-block btn-success">
              	   Create new dishes
              	</a>
              </div>
        </div>

 @endif

    <br>

    @foreach ($dishes as $dish)

    <ul class="list-group col-md-4">
      <li class="list-group-item list-group-item-successs">{{$dish['title']}}</li>
      <li class="list-group-item">
        <a href="#">
          <img src="{{ $dish->getUrlAttribute() }}" alt="" class="img-responsive">
        </a>
      </li>
      <li class="list-group-item">{!!$dish['description']!!}</li>
      <li class="list-group-item">Price: {{$dish['price']}}$</li>



      @if (Auth::check())
        @if (Auth::user()->isAdmin())
      <li class="list-group-item clearfix">
        <a
          href="{{route('dishes-edit', $dish->id)}}"
          class="btn btn-primary pull-left btn-s">
          Edit
       </a>

        <a
          href="{{ route('dishes-delete', $dish->id)}}"
          class="btn pull-right btn-danger btn-s">
          Delete
       </a>

       @endif
      @endif
       </li>
       @if (Auth::check())
       <li class="list-group-item">
         <form class="" action="{{route('cart-store')}}" method="post">
           {{ csrf_field() }}
           <input type="hidden" name="dishes_id" value="{{$dish->id}}">

             <button type="submit" name="button" class="btn btn-success btn-block js-cart btn-s">Add Cart</button>
         </form>
       </li>
       @endif
    </ul>

    @endforeach

    <center class="col-md-12">{{$dishes->links()}}</center>

</div>
<script type="text/javascript">

$(document).ready(function(){
  $('.js-cart').on('click', function(event){

    event.preventDefault();//sustabdo ivyki

    var form = $(this).parent();
    // console.log(form.serialize());

    $.ajax({
      url: form.attr('action'), //paima atributa formos
      method: 'POST',
      data: form.serialize(),
      success: function(data) {
        var parsed = JSON.parse(data);
        console.log(parsed);

        var cartTotal = $('.cart-total'),
                        cartSize = $('.cart-size'),
                        currentPrice = cartTotal.text(),
                        currentSize = cartSize.text(),
                        totalPrice = (currentPrice*1) + (parsed.price*1),
                        totalSize = (currentSize*1) + 1;

                        cartTotal.text(totalPrice.toFixed(2));
                        cartSize.text(totalSize);

      },
      error: function(msg){
                  console.log(msg.responseText);
                  // $('html').prepend(msg.responseText);
              }
    })


  });
});


</script>
@endsection
