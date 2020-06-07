@extends('layouts.app')
@section('content')

<div class="wrapper">
<main>
<div class="p-3" style="text-align:center">
                     <h1><strong>Choose Your Categories</strong></h1>
                     </div>
          <div class="main-section">
         
              <div class="container">
                  <div class="main-section-data">
                  
                     <div class="container col-6">

                   
                     @foreach ($categories as $cat)
                     @if (in_array($cat->id , $cats ))
                     <a href="/">
                     <button type="button"  class="btn btn-dark btn-lg btn-block" >{{$cat->name}}</button></a></br>
                     @else  
                     <a href="{{route('yarab', $cat->id)}}">
                     <button type="button"  class="btn btn-info btn-lg btn-block" >{{$cat->name}}</button></a></br>
                     @endif 
                    @endforeach 
                    

      
                    </div>
                    </div>
                    </div>
                    </div>

       
				
      </main>


@endsection
