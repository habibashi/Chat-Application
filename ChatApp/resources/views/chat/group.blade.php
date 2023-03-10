@extends('layout')

@section('content')

<div class="container-bg-color">
    <div style="display: flex; gap: 10px; align-items: center; padding-top: 12px; padding-bottom: 12px">
        <h2>Groups</h2>
    </div>
    <div class="card-scroll">
        @unless(count($companies) == 0)
        
        @foreach ($companies as $company)
        
        @if(Auth::user()->role == 'admin') 
        <div class="card">
            <div class="card-header" style="background-color: #EAEEF2; padding: 10px; border-block-end: #EAEEF2">
              <img style="width: 150px; height: 150px" src="{{(!empty($company->logo))? url('upload/companyLogo/' .$company->logo): url('image/blank-profile.png')}}" alt="your-image" class="rounded-img">
            </div>
            <div class="card-content">
              <div class="row">{{$company->name}}</div>
              <div class="row">{{$company->email}}</div>
              <div class="card-action">
                <a href="/chat" style="display: flex; align-items: center; gap: 4px; ">
                    <svg style="width: 15px; height: 15px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                  </svg>
                  start chat
                </a>
              </div>
            </div>
        </div>

        @elseif ($company->id === Auth::user()->company_id)
        <div class="card">
          <div class="card-header" style="background-color: #EAEEF2; padding: 10px; border-block-end: #EAEEF2">
            <img style="width: 150px; height: 150px" src="{{(!empty($company->logo))? url('upload/companyLogo/' .$company->logo): url('image/blank-profile.png')}}" alt="your-image" class="rounded-img">
          </div>
          <div class="card-content">
            <div class="row">{{$company->name}}</div>
            <div class="row">{{$company->email}}</div>
            <div class="card-action">
              <a href="/chat" style="display: flex; align-items: center; gap: 4px; ">
                  <svg style="width: 15px; height: 15px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                </svg>
                start chat
              </a>
            </div>
          </div>
        </div>
        @endif

        @endforeach
        @else
        <p>No users found</p>

        @endunless
    </div>
</div>

@endsection