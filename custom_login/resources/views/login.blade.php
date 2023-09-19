@extends('layout')
@section('title','Login') 
@section('content')
<div class="containar">
<div class= "mt-5">
    @if($errors->any())
      <div class="col-12">
        @foreach($errors->all() as error)
          <div class="alert alert-danger">{{$error}}</div>
        @endforeach
      </div> 
    @endif 

    @if(Session()->has('error'))
       <div class="alert alert-danger">{{Session('error')}}</div>
    @endif

    @if(Session()->has('Success'))
       <div class="alert alert-success">{{Session('Success')}}</div>
    @endif
  </div>
    <form action="{{route('login.post')}}" method="POST" class="ms-auto me-auto mt-auto" style="width : 500px">
    @csrf
<div class="mb-3">
    <label class="form-label">Email Address</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection