@extends('layouts.app')
@section('content')
<div class="container">
  <div class="p-3" style="text-align:center">
    <form method="POST" action="{{route('questions.store')}}">
      @csrf
      <h1 style="color:red"><strong>Create New Question</strong></h1>
      <div class="form-group mt-5">
        @if ($prof)
            <input type="hidden" class="form-control" name="prof" value="{{$prof}}">
        @else
        <div class="form-group mt-5">
    <label for="exampleFormControlSelect1">Users</label>
    <select name="prof" class="form-control ">
        @foreach($users as $user)  
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select> 
      </div>

        @endif
            <label for="exampleFormControlTextarea1" style="color:red">Ask Your Question</label>
            <textarea class="form-control" name="question" rows="3"></textarea>
        </div>
        

      <button type="submit" class="btn " style="background-color:red">Create</button>
      
    </form>  
</div>
    @endsection







