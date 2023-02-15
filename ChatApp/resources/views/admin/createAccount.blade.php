@extends('layout')

@section('content')

    @php
    $user = Auth::user();
    @endphp

    <div class="container-bg-color">
        <div style="background-color: white; padding: 14px; margin-top: 10px">
            <h3>Create Account</h3>
            <br>
            <form method="POST" action="/createAccount">
            @csrf
            <div class="row">
                <div class="col-25">
                    <label class="lable" for="name">First Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="name" name="name" placeholder="Your name.." value="{{$user->name}}">
                </div>
            </div>
            @error('name')
                <p style="color:red ">{{$message}}</p>
            @enderror
            <div class="row">
                <div class="col-25">
                    <label for="email">Email</label>
                </div>
                <div class="col-75">
                    <input type="email" id="email" name="email" placeholder="Your last email.." value="{{$user->email}}">
                </div>
            </div>
            @error('email')
                <p style="color:red ">{{$message}}</p>
            @enderror
            <div class="row">
                <div class="col-25">
                    <label for="job">Job Title</label>
                </div>
                <div class="col-75">
                    <input type="text" id="job_title" name="job_title" placeholder="Your job title.." value="{{$user->job_title}}">
                </div>
            </div>
            @error('job')
                <p style="color:red ">{{$message}}</p>
            @enderror
            <div class="row">
                <div class="col-25">
                    <label for="gender">Gender</label>
                </div>
                <div class="col-75">
                    <label>
                    <input type="radio" name="gender" value="M" {{ ($user->gender=="M")? "checked" : "" }}>
                    Male
                    </label>
                    <label>
                    <input type="radio" name="gender" value="F"  {{ ($user->gender=="F")? "checked" : "" }}>
                    Female
                    </label>
                </div>
            </div>
            @error('gender')
                <p style="color:red ">{{$message}}</p>
            @enderror
            <div class="row">
                <div class="col-25">
                    <label class="lable" for="started_working_on">started working on</label>
                </div>
                <div class="col-75">
                    <input type="text" id="name" name="name" placeholder="Your name.." value="{{$user->started_working_on}}">
                </div>
            </div>
            @error('name')
                <p style="color:red ">{{$message}}</p>
            @enderror  
            <br>
            <div class="row">
            <input class="submit-form" type="submit" value="Submit">
            </div>
            </form>
        </div>
    </div>

@endsection