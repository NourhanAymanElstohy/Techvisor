{{-- 
@include('admin.layouts.header')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('admin.layouts.navbar')
 
  @include('admin.layouts.sidebar')
  
  <div class="content-wrapper">
  <div class="container">
  <div class="p-3" style="text-align:center">
    <h1 style="color:#3cb371"><strong>Categorie</strong></h1>

    <div class="row">
    @foreach($profs as $prof) 
        <div class="col-3">
            <div class="card ">
                <div class="card-header text-center bg-success text-light">
                    Professional Data
                </div>
                <div class="card-body">
                    <h5 class="card-photo">Prof photo</h5>
                    <p class="card-text"><b>Name:</b> </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>      
</div>
  @include('admin.layouts.footer')


 --}}
