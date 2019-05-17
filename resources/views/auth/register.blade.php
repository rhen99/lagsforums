@extends('layouts.app')

@section('content')
    <section class="container login-register">
            <div class="form">
                <h2 class="form-title">{{__('Register')}}</h2>
                <form method="POST" method="{{route('register')}}">
                    @csrf
                    <div class="form-div">
                        <label for="name">{{__('Name')}}</label>
                        <input type="text" id="name" name="name" value="{{old('name')}}" autocomplete="name" autofocus required>
                        @error('name')
                            <span class="err">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-div">
                        <label for="email">{{__('Email')}}</label>
                        <input type="email" id="email" name="email" autocomplete="email" value="{{old('email')}}" required>
                         @error('email')
                            <span class="err">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-div">
                        <label for="password">{{__('Password')}}</label>
                        <input type="password" id="password" name="password" autocomplete="new-password" required>
                         @error('password')
                            <span class="err">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-div">
                        <label for="password_confirm">{{__('Confirm Password')}}</label>
                        <input type="password" id="password_confirm" name="password_confirmation" autocomplete="new-password">
                    </div>
                    <button type="submit" id="submit" name="submit" class="submit"><i class="fas fa-sign-in-alt"></i> {{__('Register')}}</button>
                </form>
            </div>
        </section>
@endsection