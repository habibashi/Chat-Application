@extends('layout')

@section('content')

    @php
    $id = Auth::user()->id;
    $data = App\Models\User::find($id);
    @endphp
  <div class="container-bg-color">
    <div style="background-color: white; padding: 14px; margin-top: 10px">
        <h3>Edit Profile Page</h3>
        <br>
        <form method="POST" action="/editProfile" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-25">
                <label class="lable" for="name">First Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="name" name="name" placeholder="Your name.." value="{{$data->name}}">
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
                <input type="text" id="email" name="email" placeholder="Your last email.." value="{{$data->email}}">
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
                <input type="text" id="job" name="job" placeholder="Your job title.." value="{{$data->job_title}}">
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
                  <input type="radio" name="gender" value="M" {{ ($data->gender=="M")? "checked" : "" }}>
                  Male
                </label>
                <label>
                  <input type="radio" name="gender" value="F"  {{ ($data->gender=="F")? "checked" : "" }}>
                  Female
                </label>
            </div>
        </div>
        @error('gender')
            <p style="color:red ">{{$message}}</p>
        @enderror
        <div class="row">
            <div class="col-25">
                <label for="photo">Profile Image</label>
            </div>
            <div class="col-75">
                <input type="file" id="photo" name="photo" placeholder="Your image.."   >
            </div>
            <img width="33px" height="33px" src="{{(!empty($data->photo))? url('upload/images/' .$data->photo): url('image/blank-profile.png')}}" alt="Your name">
        </div> 

        @error('photo')
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