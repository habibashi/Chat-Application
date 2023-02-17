@extends('layout')

@section('content')

    @php
    $id = Auth::user()->company_id;
    $data = App\Models\Company::find($id);
    @endphp

    <div class="container-bg-color">
        <div style="background-color: white; padding: 14px; margin-top: 10px">
            <h3>Create Company</h3>
            <br>
            <form method="POST" action="/updateCompany" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-25">
                    <label class="lable" for="name">Company Name</label>
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
                    <input type="email" id="email" name="email" placeholder="Your last email.." value="{{$data->email}}">
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
                    <input type="text" id="description" name="description" placeholder="description" value="{{$data->description}}">
                </div>
            </div>
            @error('description')
                <p style="color:red ">{{$message}}</p>
            @enderror 
            {{-- <div class="row">
                <div class="col-25">
                    <label for="active">Activation</label>
                </div>
                <div class="col-75">
                    <label>
                    <input type="radio" name="active" value="1" {{ ($data->active=="1")? "checked" : "" }}>
                    Active
                    </label>
                    <label>
                    <input type="radio" name="active" value="0" {{ ($data->active=="0")? "checked" : "" }}>
                    Deactive
                    </label>
                </div>
            </div>
            @error('active')
                <p style="color:red ">{{$message}}</p>
            @enderror  --}}
            <div class="row">
                <div class="col-25">
                    <label for="logo">Logo</label>
                </div>
                <div class="col-75">
                    <input type="file" id="logo" name="logo" placeholder="Your Logo..">
                </div>
                <img width="33px" height="33px" src="{{(!empty($data->logo))? url('upload/companyLogo/' .$data->logo): url('image/blank-profile.png')}}" alt="Your name">
            </div> 
            @error('logo')
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