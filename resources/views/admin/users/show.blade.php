 @include('admin.layouts.header')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('admin.layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 
  @include('admin.layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container" > 
  <div class=" p-4" style="text-align:center;">

  <div class="mx-auto text-center ">
      <img src="/uploads/avatars/{{$user->avatar}}"  class="mx-auto" style="width: 300px;">
    </div>
    </br>

        <h5 style="color:#3cb371"><strong>Name :  </strong><span style="color:black"><strong> {{$user->name}}</strong></span></h5>
        <h5 style="color:#3cb371"><strong>E.mail : </strong><span  style="color:black"><strong> {{$user->email}}</strong></span></h5>
        <h5 style="color:#3cb371"><strong>Role : </strong><span  style="color:black"><strong>{{$user->roles->implode('name', ',')}}</strong></span></h5>
        <h5 style="color:#3cb371"><strong>Stauts : </strong><span  style="color:black"><strong>
        @if($user->status==0)
          Online
        @elseif($user->status==1)
          Offline
        @endif  
        </strong></span></h5>  
        @if ($user->role==1)               
        <h5 style="color:#3cb371"><strong>Banned At  : </strong><span  style="color:black"><strong>{{ $user->banned_at }}</strong></span></h5>  
        @endif 
        @if ($user->role==1)               
        @if ($user->isNotBanned())                
        <a  href="{{ route('users.banned',['user'=>$user->id]) }}" class="btn btn-dark mr-2">Ban</a>
          @else
        <a  href="{{ route('users.banned',['user'=>$user->id]) }}" class="btn btn-success mr-2">Unban</a>
          @endif
          @endif
         
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')

