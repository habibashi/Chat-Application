@extends('layout')

@section('content')

    @php
    $user = Auth::user();
    $company = App\Models\Company::all();
    @endphp

    <div class="container-bg-color">
        <div style="background-color: white; padding: 14px; margin-top: 10px">
            <h3>Edit Activision Company</h3>
            <br>
            <form method="POST" action="/activeCompany" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                        <label for="active">Activation</label>
                    </div>
                    <div class="col-75">
                        <label>
                        <input type="radio" name="active" value="1">
                        Active
                        </label>
                        <label>
                        <input type="radio" name="active" value="0" >
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