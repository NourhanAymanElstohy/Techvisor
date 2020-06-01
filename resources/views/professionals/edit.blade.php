@extends('layouts.app')
@section('content')
<form method="POST" action="{{route('professionals.update',$user->id)}}">
  @csrf
    <div class="form-group">
        <label for="exampleFormControlTextarea1">UPDATE YOUR status</label><br/>
        <input type="hidden" class="form-control" name="id" value="{{$user->id}}">
        <label for="exampleFormControlSelect1">user_name</label>
        <input type="text" class="form-control" name="name" value="{{$user->name}}"><br/>
        <div class="col-md-6">
        <legend>{{$user->status}}</legend>

                                <select class="custom-select" name="status">
                                    <option value="offline">Offline</option>
                                    <option value="online">Online</option>
                                </select>
                            </div>
    </div>
    

  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>  
@endsection
