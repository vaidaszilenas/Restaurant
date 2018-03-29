@extends('layouts.app', [
  'title'=>'Orders list'
])
@section('content')

  <div class="container" style="margin-top:50px">
    {{-- @foreach ($orders as $order) --}}
    <h1>Orders ({{ count($orders) }})</h1>
    {{-- @endforeach --}}
    <hr>
    <div class="panel panel-default">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Orders</th>
            <th>User</th>
            <th>Address</th>
            <th>Total Amount</th>
            <th>Tax Amount</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($orders as $order)
          <tr>

              <th scope="row">{{ $order->id }}</th>

              <td>
                <ul>
                  @foreach ($order->carts as $cart)
                    <li>
                      <small>
                        <a href="{{route ('dishes-admin', $cart->dishes->id)}}">{{ $cart->dishes->title}}</a>

                      </small>
                    </li>
                  @endforeach
                </ul>
              </td>

              <td>
                  @if ($order->user->isAdmin())
              <span>{{ 'admin' }}</span>
              @else
                <span> {{ 'user' }}</span>
            @endif
              </td>
              <td>
                {{-- @foreach ($users as $user) --}}
                <span>{{ $order->user->address }}</span>
              {{-- @endforeach --}}
              </td>

              <td>{{$order->total_amount}} $</td>
              <td>{{$order->tax_amount}} $</td>
              <td>{{$order->created_at}}</td>

          </tr>
          @endforeach
        </div>





      @endsection
