@extends('layouts.app')

@section('content')
<div class="container col-6">
    <form method="POST" action="{{route('categories.update',['category'=>$category->id])}}" class="mb-4">
        @csrf
        @method('PUT')
        <h1 class="mt-5 text-center">Edit Category</h1>
        <div class="form-group mt-5">
            <label>Name</label>
        <input name="name" type="text" class="form-control" aria-describedby="emailHelp" value="{{$category->name}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
</div>

@endsection