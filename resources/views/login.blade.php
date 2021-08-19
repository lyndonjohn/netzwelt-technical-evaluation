@extends('layout')

@section('content')
    <h2>Login Form</h2>
    @if(session('message'))
        <div class="alert">{{ session('message') }}</div>
    @endif
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            @error('username')
            <div class="alert">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            @error('password')
            <div class="alert">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="login-btn">Login</button>
    </form>
@endsection
