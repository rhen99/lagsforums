@extends('layouts.app')

@section('content')
    <section class="container login-register">
            <div class="form">
                <h2 class="form-title">{{__('Login')}}</h2>
                <form method="POST" method="{{route('login')}}">
                    @csrf
                    <div class="form-div">
                        <label for="email">{{__('Email')}}</label>
                        <input type="email" id="email" name="email" value="{{old('email')}}">
                        @error('email')
                            <span class="err">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-div">
                        <label for="password">{{__('Password')}}</label>
                        <input type="password" id="password" name="password">
                         @error('password')
                            <span class="err">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="remember-me">
                        <input type="checkbox" id="remember-token" name="remember"{{old('remember') ? 'checked': ''}}>
                        <label for="remember-token">{{__('Remember Me')}}</label>
                    </div>
                    <button type="submit" id="submit" name="submit" class="submit"><i class="fas fa-sign-in-alt"></i> {{__('Login')}}</button>
                </form>
            </div>
        </section>
@endsection