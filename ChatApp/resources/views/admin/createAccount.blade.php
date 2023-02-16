@extends('layout')

@section('content')

    @php
    $user = Auth::user();
    $company = App\Models\Company::all();
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
                    <input type="text" id="name" name="name" placeholder="Your name.." value="{{old('name')}}">
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
                    <input type="email" id="email" name="email" placeholder="Your last email.." value="{{old('email')}}">
                </div>
            </div>
            @error('email')
                <p style="color:red ">{{$message}}</p>
            @enderror
            <div class="row">
                <div class="col-25">
                    <label for="email">Password</label>
                </div>
                <div class="col-75">
                    <input type="password" id="password" name="password" placeholder="password.." value="{{old('password')}}">
                </div>
            </div>
            @error('password')
                <p style="color:red ">{{$message}}</p>
            @enderror
            <div class="row">
                <div class="col-25">
                    <label for="email">Confirmation Password</label>
                </div>
                <div class="col-75">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="confirmation.." value="{{old('password_confirmation')}}">
                </div>
            </div>
            @error('password_confirmation')
                <p style="color:red ">{{$message}}</p>
            @enderror
            <div class="row">
                <div class="col-25">
                    <label for="job">Job Title</label>
                </div>
                <div class="col-75">
                    <input type="text" id="job_title" name="job_title" placeholder="Your job title.." value="{{old('job_title')}}">
                </div>
            </div>
            @error('job')
                <p style="color:red ">{{$message}}</p>
            @enderror
            <div class="row">
                <div class="col-25">
                    <label for="job">Company</label>
                </div>
                <div class="col-75" style="width:200px;">
                    <select name="company_id">
                    @foreach ($company as $i)
                      <option value="{{$i->id}}">{{$i->name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            @error('company_id')
                <p style="color:red ">{{$message}}</p>
            @enderror
            <div class="row">
                <div class="col-25">
                    <label for="gender">Gender</label>
                </div>
                <div class="col-75">
                    <label>
                    <input type="radio" name="gender" value="M">
                    Male
                    </label>
                    <label>
                    <input type="radio" name="gender" value="F">
                    Female
                    </label>
                </div>
            </div>
            @error('gender')
                <p style="color:red ">{{$message}}</p>
            @enderror
            <div class="row">
                <div class="col-25">
                    <label for="gender">Role</label>
                </div>
                <div class="col-75">
                    <label>
                        <input type="radio" name="role" value="admin">
                        Admin
                    </label>
                    <label>
                    <input type="radio" name="role" value="manager">
                    Manager
                    </label>
                    <label>
                    <input type="radio" name="role" value="employee">
                    Employee
                    </label>
                </div>
            </div>
            @error('role')
                <p style="color:red ">{{$message}}</p>
            @enderror
            <div class="row">
                <div class="col-25">
                    <label class="lable" for="started_working_on">started working on</label>
                </div>
                <div class="col-75">
                    <input type="date" id="started_working_on" name="started_working_on" placeholder="Your name.." value="{{old('started_working_on')}}">
                </div>
            </div>
            @error('started_working_on')
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