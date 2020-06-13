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
    <form method="POST" action="{{route('professionals.update',$professional->id)}}" class="mb-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="text-align:center">
                    <h1 style="color:#E44D3A; font-size:50px;"><strong>Edit Profile</strong></h1> 
                </div>

        
        <div class="form-group mt-5">
            <label >Name</label>
            <input name="name" type="text"  class="form-control" value="{{$professional->name}}">
        </div>

        <div class="form-group mt-5">
            <label >Email</label>
            <input name="email" type="text"  class="form-control" value="{{$professional->email}}">
        </div>
        <div class="form-group mt-5">
            <label >Password</label>
            <input name="password" type="password"  class="form-control" value="{{$professional->password}}">
        </div>

        <div class="form-group mt-5">
            <label style="color: #E44E3A"><strong>Linkedin</strong></label>
            <input name="linkedin" type="text"  class="form-control" value="{{$professional->linkedin}}">
        </div>

        <div class="form-group mt-5">
            <label style="color: #E44E3A"><strong>Github</strong></label>
            <input name="github" type="text"  class="form-control" value="{{$professional->github}}">
        </div>

        <div class="form-group mt-5">
            <label style="color: #E44E3A"><strong>Add Other Website</strong></label>
            <input name="other" type="text"  class="form-control" value="{{$professional->other}}">
        </div>

        <div class="form-group mt-5">
   <h6 style="color: #E44E3A"><strong>Profile Image</strong></h6>
  <div class="custom-file ">
  <input type="file"  id="customFileLangHTML" value="{{$professional->avatar}}"  name="avatar">
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
	
