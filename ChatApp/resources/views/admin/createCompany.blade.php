@extends('layout')

@section('content')

    <div class="container-bg-color">
        <div style="background-color: white; margin-top: 10px; padding: 14px">
            <h3>Create Company</h3>
            <br>
            <form method="POST" action="/createCompany" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-25">
                    <label class="lable" for="name">Company Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="name" name="name" placeholder="Your name..">
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
                    <input type="email" id="email" name="email" placeholder="Your last email..">
                </div>
            </div>
            @error('email')
                <p style="color:red ">{{$message}}</p>
            @enderror
            <div class="row">
                <div class="col-25">
                    <label for="description">Description</label>
                </div>
                <div class="col-75">
                    <input type="text" id="description" name="description" placeholder="description">
                </div>
            </div>
            @error('description')
                <p style="color:red ">{{$message}}</p>
            @enderror
            <div class="row">
                <div class="col-25">
                    <label for="logo">Logo</label>
                </div>
                <div class="col-75">
                    <input type="file" id="logo" name="logo" placeholder="Your Logo.."   >
                </div>
            </div> 
    
            @error('logo')
                <p style="color:red ">{{$message}}</p>
            @enderror  
            <div class="row">
                <div class="col-25">
                    <label for="active">Activation</label>
                </div>
                <div class="col-75">
                    <label>
                    <input type="radio" name="active" value="1" >
                    Active
                    </label>
                    <label>
                    <input type="radio" name="active" value="0">
                    Deactive
                    </label>
                </div>
            </div>
            @error('active')
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