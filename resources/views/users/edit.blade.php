@extends('layouts.app')
@section('content')

<div class="wrapper">
      
   

      <main>
          <div class="main-section">
              <div class="container">
                  <div class="main-section-data">
                     <div class="container col-6">
                     
                     @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
        <form method="POST" action="{{route('users.update',$user->id)}}" class="mb-4" enctype="multipart/form-data" >
            @csrf 
            @method('PUT')
        <h1 class="text-center" style="color: #E44E3A; font-size:50px;"><strong>Edit Profile</strong></h1>      
               
        <div class="form-group mt-5">
            <label style="color: #E44E3A">  <strong> Name</strong></label>
            <input name="name" type="text"  class="form-control" value="{{$user->name}}">
        </div>

        <div class="form-group mt-5">
            <label style="color: #E44E3A"><strong> Email</strong></label>
            <input name="email" type="text"  class="form-control" value="{{$user->email}}">
        </div>

        <div class="form-group mt-5">
            <label style="color: #E44E3A"><strong> Password</strong></label>
            <input name="password" type="password"  class="form-control" value="{{$user->password}}">
        </div>

        <div class="form-group mt-5">
            <label style="color: #E44E3A"><strong>Linkedin</strong></label>
            <input name="linkedin" type="text"  class="form-control" value="{{$user->linkedin}}">
        </div>

        <div class="form-group mt-5">
            <label style="color: #E44E3A"><strong>Github</strong></label>
            <input name="github" type="text"  class="form-control" value="{{$user->github}}">
        </div>

        <div class="form-group mt-5">
            <label style="color: #E44E3A"><strong>Add Other Website</strong></label>
            <input name="other" type="text"  class="form-control" value="{{$user->other}}">
        </div>

   
        <div class="form-group mt-5">
   <h6 style="color: #E44E3A"><strong>Profile Image</strong></h6>
  <div class="custom-file ">
  <input type="file"  id="customFileLangHTML" value="{{$user->avatar}}"  name="avatar">
  <label class="custom-file-label" for="customFileLangHTML" data-browse="Bestand kiezen">Upload Image</label>
</div>
</div>






        
        <div class="justify-content-end mt-5">
           <input type="submit" value="Submit" class="btn btn-success">
           </div>
    </form>
					</div>
				</div> 
			</div>
      </div>
      </main>


	

@endsection
