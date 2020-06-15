@extends('layouts.app')
@section('content')

<div class="wrapper">
     


      <main>
          <div class="main-section">
              <div class="container">
                  <div class="main-section-data">
                     <div class="container col-6">




                     <h1 style="color: #E44E3A; font-size:50px;"><strong>Privacy Settings</strong></h1>
                     <br>
                     <br>
                     <br>
                     <h4 style="color: #E44E3A"><strong>Your Activity</strong></h4>
                     <p>You can ask a question public or to professional privatly</p>
                     <p>only other users can find your profile</p>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <h4><strong>For any help you can contact us through this email : </strong></h4>
                     <a href="https://mail.google.com/mail/u/0/#inbox?compose=new" style="color: #E44E3A"><strong> techvisor.consulting@gmail.com</strong></a>

                     <br>
                     <br>
                     <br>
                     <br>



                     <form action="{{route('users.destroy', $user->id) }}" method="POST"
    class="float-left mr-2"> 
    @csrf
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-danger mr-2" onclick="return confirm ('are you sure you want to delete your acount, there is no undo?')">Delete your acount !</button>
    </form>



    </div> 
			</div>
      </div>
      </div>
      </main>


	

@endsection



