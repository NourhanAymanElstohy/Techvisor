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
                     <a href="{{route('try2', $cat->id)}}">
                     <button type="button"  class="btn btn-dark btn-lg btn-block" >{{$cat->name}}</button></a></br>
                   
                    @endforeach 
                    
      
                    </div>
                    </div>
                    </div>
                    </div>

       
				
      </main>

 <script>
 let btnactive = document.querySelector('#active');
 btnactive.addEventlistener('click',() => btnactive.style.backgroundColor= '#8AF194')
 </script>

@endsection
