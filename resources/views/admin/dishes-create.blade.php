@extends('layouts.app', [
  'title'=>'Create dishes'
])
@section('content')
  <div class="container">
<div class="row">
  <div class="col-md-12">
      <a href="{{ route('dishes-admin')}}"
class="btn btn-danger btn-lg btn-block">
Back
</a>            <hr>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading">
          New Dish
          </div>
          <div class="panel-body">
              <form class="form-horizontal" method="POST" action="{{ route('store')}}" enctype="multipart/form-data">
                {!!csrf_field() !!}

              <div class="form-group">
                      <label for="title" class="col-md-4 control-label">Title</label>
                      <div class="col-md-6">
                          <input id="title" type="text" class="form-control" name="title" value="{{old('title')}}">
                          @if ($errors->has('title'))
                            <span style="color:red;">{{$errors->first('title')}}</span><br>
                          @endif
                                                      </div>
                  </div>

                  <div class="form-group">
                      <label for="description" class="col-md-4 control-label">Description</label>
                      <div class="col-md-6">
                          <input id="description" type="text" class="form-control" name="description" value="{{old('description')}}">
                          @if ($errors->has('description'))
                            <span style="color:blue;">{{$errors->first('description')}}</span><br>
                          @endif
                                                      </div>
                  </div>

                  <div class="form-group">
                      <label for="price" class="col-md-4 control-label">Price</label>
                      <div class="col-md-6">
                          <input id="price" type="text" step="0.01" class="form-control" name="price" value="{{old('price')}}">
                          @if ($errors->has('price'))
                            <span style="color:green;">{{$errors->first('price')}}</span><br>
                          @endif
                                                      </div>
                  </div>
                  <div class="form-group">
                      <label for="image_url" class="col-md-4 control-label">Image pic</label>
                      <div class="col-md-6">
                          <input style="padding-top: 5px"id="image_url" type="file" class="" name="file_name" value="">
                          @if ($errors->has('file_name'))
                            <span style="color:magenta;">{{$errors->first('file_name')}}</span><br>
                          @endif
                        </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                          <button type="submit" class="btn btn-primary">
                              Register
                          </button>
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
