@extends('layouts.app', [
  'title'=>'Registration list'
])

@section('content')


  <div class="container" style="margin-top:50px">
    {{-- @foreach ($orders as $order) --}}
    <h1>Users ({{ count($users) }})</h1>
    {{-- @endforeach --}}
    <hr>
    <div class="panel panel-default">
      <table class="table">
        <tbody>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Country</th>
            <th>City</th>
            <th>Login</th>
            <th>Action</th>
          </tr>
        </thead>

        </div>


          @foreach ($users as $user)
            <tr>

              <th scope="row">{{ $user->id }}</th>

              <td>
                <span>{{ $user->name}}</span>
              </td>
              <td>
                <span>{{ $user->surname}}</span>
              </td>
              <td>
                <span>{{ $user->email}}</span>
              </td>
              <td>
                <span>{{ $user->phone_number}}</span>
              </td>
              <td>
                <span>{{ $user->country}}</span>
              </td>
              <td>
                <span>{{ $user->city}}</span>
              </td>

              <td>
                @if ($user->is_admin == 1)
                  <span>{{ 'Admin' }}</span>
                @else
                  <span> {{ 'User' }}</span>
                @endif
              </td>


              <form class="" action="{{route('users-destroy', $user->id)}}" method="POST">
                {!!csrf_field()!!}
                {!!method_field('delete')!!}
                <td>

                  @if ($user->is_admin == 1)
                    <button name="button" class="btn btn-xs btn-danger" disabled>Undeletable</button>
                  @else

                    <button type="submit" class="btn btn-xs btn-success">DROP</a>
                    @endif
                  </td>
                </form>


              </tr>

          @endforeach
          </table>
        </tbody>

        </div>
        <center>  {{$users->links()}} </center>










      @endsection
