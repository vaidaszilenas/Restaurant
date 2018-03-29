@extends('layouts.app', [
  'title'=>'Create reservation'
])
@section('content')

  <div class="container">
    <div class="row">
      <a href="{{ route('reservations-index')}}"
      class="btn btn-danger btn-lg btn-block">
      Back
    </a>    <hr>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Create reservation</div>
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route('store-reservation')}}">
            {{ csrf_field() }}
            {{-- @foreach ($reservations as $reservation) --}}


            <div class="form-group">
              <label for="name" class="col-md-4 control-label">Name</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}">
                @if ($errors->has('name'))
                  <span style="color:red;">{{$errors->first('name')}}</span><br>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="people_amount" class="col-md-4 control-label">People amount</label>
              <div class="col-md-6">
                <input id="people_amount" type="text" class="form-control" name="people_amount" value="{{old('people_amount')}}">
                @if ($errors->has('people_amount'))
                  <span style="color:red;">{{$errors->first('people_amount')}}</span><br>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="date" class="col-md-4 control-label">Date</label>
              <div class="col-md-6">
                <input id="date" type="text" class="form-control" name="date" value="{{old('date')}}">
                @if ($errors->has('date'))
                  <span style="color:red;">{{$errors->first('date')}}</span><br>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="phone" class="col-md-4 control-label">Phone</label>
              <div class="col-md-6">
                <input id="phone" type="text" class="form-control" name="phone" value="{{old('phone')}}">
                @if ($errors->has('phone'))
                  <span style="color:red;">{{$errors->first('phone')}}</span><br>
                @endif
              </div>
            </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary" >
                    Reservate
                  </button>
                  {{-- @endforeach --}}
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
