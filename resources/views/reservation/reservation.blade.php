@extends('layouts.app', [
  'title'=>'List of reservations'
])

@section('content')

  <div class="container" style="margin-top:50px">
    <div class="row">
              <h1>Reservations ({{count($reservations)}})</h1>
      <hr>
    </div>

    <div class="row">
      <a
      href="{{ route ('create-reservation')}}"
      class="btn btn-lg btn-block btn-success">
      Create new reservation
    </a>
    <hr>
  </div>

  <div class="row">
    <div class="panel panel-default">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Phone</th>
            <th>People Amount</th>
            <th>Reserved</th>
            <th>Created</th>
            <th>User</th>
            <th>Action</th>
          </tr>
        </thead>
          @foreach ($reservations as $reservation)

          <tr>
            <th scope="row">{{$reservation->id}}</th>
            <td>{{$reservation->name}}</td>
            <td>{{$reservation->phone}}</td>
            <td>{{$reservation->people_amount}}</td>
            <td>
              {{$reservation->date}}
            </td>
            <td>
              {{$reservation->created_at}}
            </td>
            <td>{{$reservation->user}}</td>
              <td>
                {{-- {{dd($reservation->user)}}
                {{dd(Auth::user())}} --}}
              @if ($reservation->user == Auth::user()->name)
                <a href="{{route('edit-reservations', $reservation->id)}}" class="btn btn-primary btn-xs">Edit</a>
                @else
                <a href="{{route('edit-reservations', $reservation->id)}}" class="btn btn-danger btn-xs" disabled>Edit</a>
              @endif


                @if (Auth::user()->isAdmin())
                  <form class="" action="{{route('destroy-reservations', $reservation->id)}}" method="post" style="display: inline-block;">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                      <button type="submit" name="button" class="btn btn-danger btn-xs" >Drop</button>
                  </form>
                @endif


              </td>
          </tr>
          @endforeach


        </tbody>
      </table>
    </div>
  </div>
</div>
<center> {{$reservations->links()}} </center>
</div>



@endsection
