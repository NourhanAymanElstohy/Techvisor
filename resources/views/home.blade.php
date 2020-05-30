@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    you are logedin<br>
                    Go to 
                    <a href="{{route('categories.index')}}">Categories</a><br/>
                    <a href="{{route('users.edit')}}">edit your profile</a><br>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
