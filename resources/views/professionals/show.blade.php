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

@endsection
