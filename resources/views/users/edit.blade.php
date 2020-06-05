@extends('layouts.app')
@section('content')

<div class="wrapper">
      
   

      <main>
          <div class="main-section">
              <div class="container">
                  <div class="main-section-data">
                     <div class="container col-6">
  <form method="POST" action="{{route('users.update',$user->id)}}"  class="mb-4">
  @csrf
        @method('PUT')
  <h1 class="mt-5 text-center">Edit Profile</h1>
        <div class="form-group mt-5">
            <label >Name</label>
            <input name="name" type="text" required class="form-control" value="{{$user->name}}">
        </div>

        <div class="form-group mt-5">
            <label >Email</label>
            <input name="email" type="text" required class="form-control" value="{{$user->email}}">
        </div>

        <div class="form-group mt-5">
            <label >Password</label>
            <input name="password" type="password"  class="form-control">
        </div>

       
        <div class="justify-content-end">
           <input type="submit" value="Submit" class="btn btn-success">
           </div>
    </form>
					</div>
				</div> 
			</div>
      </div>
      </main>


	

@endsection
