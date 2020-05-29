@extends('layouts.app')

@section('content')

<div class="container m-5">
    <div class="row">
    @foreach($profs as $prof) 
        <div class="col-3">
            <div class="card ">
                <div class="card-header text-center bg-primary text-light">
                    Professional Data
                </div>
                <div class="card-body">
                    {{-- <h5 class="card-photo">Prof photo</h5> --}}
                    <p class="card-text"><b>Name: {{$prof->name}} </b> </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>    

@endsection