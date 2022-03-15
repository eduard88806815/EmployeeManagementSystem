{{-- @extends('layouts.auth-master') --}}
@extends('layouts.app')


@section('content')
    {{-- @guest
    <div class="text-end">
    <a href="{{ route('register.perform') }}" class="btn btn-success">Sign-up</a>
    </div>
    @endguest --}}

    <div class="container" id="formField">
        <div class="card ">
            <h5 class="card-header">Employee Management System</h5>

            <div class="card-body">
                <form method="post" action="{{ route('login.perform') }}">
                    @csrf 
                    
                    <h1 class="h3 mb-3 fw-normal text-center">Login</h1>

                    @include('layouts.messages')

                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
                        <label for="floatingName">Email or Username</label>
                        @if ($errors->has('username'))
                            <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group form-floating mb-3">
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                        <label for="floatingPassword">Password</label>
                        @if ($errors->has('password'))
                            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                    
                    
                </form>

                
            </div>
        </div>
    </div>
@endsection