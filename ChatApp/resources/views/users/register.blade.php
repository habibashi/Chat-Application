@extends('layout')

@section('content')
<div class="container">
    <div class="card-auth">
      <h3 style="text-align: center;">Register</h3>
      <form method="POST" action="/users">
        @csrf 
        <label for="name">FullName:</label>
        <input type="text" id="name" name="name" value="{{old('name')}}">
        @error('name')
            <p style="color:red ">{{$message}}</p>
        @enderror
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
        <label for="password2">
            Confirm Password
        </label>
        <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" />
        @error('password_confirmation')
          <p style="color:red">{{$message}}</p>
        @enderror
        <input type="submit" value="Register">
      </form>
    </div>
  </div>
@endsection