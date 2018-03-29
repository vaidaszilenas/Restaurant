@extends('layouts.app', [
  'title'=>'Wrong page'
])

@section('content')

      <div class="panel panel-default"  style=" background-color: black;">
        <div class="panel-body text-center">
          @for ($i=0; $i < 10; $i++)
            <h1 style="color: red;"> <strong>404! Page not found!</strong></h1>
            <hr>
          @endfor
        </div>
      </div>




@endsection
