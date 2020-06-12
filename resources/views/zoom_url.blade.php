@extends('layouts.app')
@section('content')

<div class="wrapper">

    <main>
        <div class="main-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6 card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3>You created a {{$meeting->topic}}</h3>
                                <hr>
                            </div>
                                <h4 class="card-text"><b>Meeting ID: </b>{{$meeting->id}}</h4>
                                <h4 class="card-text">Meeting Password: {{$meeting->password}}</h4>
                                <h3 class="card-text">Meeting URL: <a href="{{$meeting->join_url}}" target="_blank" class="">{{$meeting->join_url}}</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> 

@endsection