@extends('layout')

@section('content')

<div class="container">
    <div class="card-auth">
      <h3 style="text-align: center;">Login</h3>
      <p style="text-align: center;">log into your account</p>

      <form method="POST" action="/users/authenticate">
        @csrf

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{old('email')}}">
        @error('email')
            <p style="color:red ">{{$message}}</p>
        @enderror
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="{{old('password')}}">
        @error('password')
            <p style="color:red ">{{$message}}</p>
        @enderror
        <input type="submit" value="Login">
      </form>
    </div>
  </div>

@endsection