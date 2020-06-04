@extends('layouts.app')

@section('content')
<div class="login-sec">
<div class="card-header sign_in_sec current" id="tab-2"><h3>{{ __('Register') }}</h3></div>

<div class="main-section">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

            <div class="card">
                
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Register As') }}</label>

                            <div class="col-md-6">
                                <select class="custom-select" name="role" id="role-option" >
                                    <option value="1">User</option>
                                    <option value="2">Professional</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="cat-section">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Categories') }}</label>

                            <div class="col-md-6">
                                <select class="custom-select" name="categories[]" multiple>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                     @endforeach
                                </select>
                            </div>


                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="    color: #ffffff;
    font-size: 16px;
    background-color: #e44d3a;
    padding: 12px 27px;
    border: 0;
    font-weight: 500;
   ">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div><!--login-sec end-->
        </div>
    </div>
</div>
</div>
{{--    <script language="JavaScript">--}}
{{--const  role=document.getElementById('role-option');--}}
{{--const cat =document.getElementById('cat-section');--}}
{{--if(role.value=='1'){--}}
{{--    cat.style.visibility='hidden';--}}
{{--}--}}
{{--else if (role.value=='2'){--}}
{{--    cat.style.visibility='visible';--}}
{{--}--}}
{{--    </script>--}}
@endsection
