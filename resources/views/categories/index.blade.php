@extends('layouts.app')
  @section('content')
  <div class="container">
    <div class="mt-5" style="display: flex; width: 100%; align-items: stretch;">
      <nav id="sidebar">
        <div class="sidebar-header">
              <h3>IT Categories</h3>
          </div>

          <ul class="list-unstyled components">
              <li class="active">
              @foreach ($categories as $category)
              <li>
                  <a href="{{route('categories.show',['category' => $category->id])}}">{{$category->name}}</a>
              </li>
              @endforeach
          </ul>
      </nav>

    </div>
  </div>
@endsection