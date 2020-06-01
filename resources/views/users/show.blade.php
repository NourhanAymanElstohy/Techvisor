@extends('layouts.app')
@section('content')
  <div class="container">

  <table  class="table table-striped table-bordered" style="width:80rem%">
  <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>status</th>
            </tr>
            </thead>
        <tbody>
        <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
        @if($user->status=='online')
          <td>Active</td>
        @elseif($user->status=='offline')
          <td>Inactive</td>  
        @endif 
        </tr>
        </tbody>
    </table>

</div>   </div>
  @endsection


