@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card ">
                <div class="card-body">
                    <p class="card-text"><b>Name: {{$prof->name}} </b> </p>
                    <p class="card-text"><b>Email: {{$prof->email}} </b> </p>
                    <p class="card-text"><b>Status: {{$prof->status}} </b> </p>
                </div>
            </div>
        </div>
    </div>
</div>    

@endsection