@extends('layouts.app')
@section('content')
<div class="main-section" style="z-index:1">
<div class="container" style="margin-bottom :500px">
  <div class="p-3" style="text-align:center" >
    <form method="POST" action="{{route('questions.store')}}">
      @csrf
      <h1 style="color:red"><strong>Create New Question</strong></h1>
      <div class="form-group mt-5">
        @if ($prof)
            <input type="hidden" class="form-control" name="prof" value="{{$prof}}">
            <input type="hidden" class="form-control" name="cat" value="{{$cat}}">
        @else
        <label for="exampleFormControlSelect1">categories</label>
            <select name="cat" class="form-control" value="">
            <option value=""></option>
            @foreach($cats as $cat)  
            <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
            </select> 
          </div>
        @endif

            <label for="exampleFormControlTextarea1" style="color:red">Ask Your Question</label>
            <textarea class="form-control" name="question" rows="3"></textarea>
            <div class="form-group mt-5">
            
            </div>
            

      <button type="submit" class="btn " style="background-color:red">Create</button>
      
    </form>  
</div>
</div>
    @endsection







