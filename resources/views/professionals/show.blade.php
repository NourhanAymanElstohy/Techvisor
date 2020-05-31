@extends('layouts.app')

@section('content')
<table id="example" class="table table-striped table-bordered" style="width:80rem%">
        <thead>
            <tr>
                <th>Name</th>
                <th>email</th>
                <th>status</th>
                @role('professional')
                <th>ChangeStatus</th>
                @endrole
            </tr>
        </thead>
        <tbody><tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                @if($user->status=='online')
                  <td>Online</td>
                 @elseif($user->status=='offline')
                 <td>Offline</td>  
                  @endif  
                  @role('professional')
                <td><a href="{{route('professionals.edit')}}" class="btn btn-primary">change</a></td>
                @endrole                  
            </tr>
            </tbody>
    </table>

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

