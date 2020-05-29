@extends('layouts.app')
@section('content')
  <form method="POST" action="{{route('users.update')}}">
  @csrf
  
  <div class="container col-6">
    <div class="form-group">
        <label for="exampleFormControlTextarea1">UPDATE YOUR PROFILE</label><br/>
        <input type="hidden" class="form-control" name="id" value="{{$user->id}}">
        <label for="exampleFormControlSelect1">user_name</label>
        <input type="text" class="form-control" name="name" value="{{$user->name}}"><br/>
        <label for="exampleFormControlSelect1">email</label>

        <input type="text" class="form-control" name="email" value="{{$user->email}}"><br/>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  
</form>  
@endsection
