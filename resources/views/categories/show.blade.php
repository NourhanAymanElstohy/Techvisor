@extends('layouts.app')

@section('content')

<div class="container m-5">
    <div class="row">
    @foreach($profs as $prof) 
        <div class="col-3">
            <div class="card ">
                <div class="card-header text-center bg-primary text-light">
                    <a href="{{route('professional.show',['prof' => $prof->id])}}" class="text-light">{{$prof->name}}</a>
                </div>
                <div class="card-body">
                    <a href="{{route('questions.createprof',['prof'=> $prof->id])}}" class="btn btn-primary btn-sm">ask</a>
                    <a href="/zoom/{{$prof->id}}" class="btn btn-primary btn-sm">zoom</a>
                    </div>
            </div>
        </div>
        @endforeach
    </div>
</div>    

@endsection