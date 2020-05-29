@extends('layouts.app')

@section('content')
<table id="example" class="table table-striped table-bordered" style="width:80rem%">
        <thead>
            <tr>
                <th>Name</th>
                <th>email</th>
                @role('professional')
                <th>status</th>
                <th>ChangeStatus</th>
                @endrole
            </tr>
        </thead>
        <tbody><tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                @role('professional')
                @if($user->status=='online')
                  <td>Online</td>
                 @elseif($user->status=='offline')
                 <td>Offline</td>  
                  @endif  
                <td><a href="{{route('professionals.edit')}}" class="btn btn-primary">change</a></td>
                @endrole                  
            </tr>
            </tbody>
    </table>

@endsection
