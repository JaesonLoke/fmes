@extends('layouts.pages')

@section('content')
    <!-- table -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row justify-content-center"  >
        <div class="col-xl-10 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
              <div class="row justify-content-center">
                  <div class="col-lg-3 order-lg-2">
                      <div class="card-profile-image">
                          <a href="#">
                              <img src=" @if($user->id !=null{ {{route('user.fetch',$user->id)}} } @else{ {{ asset('argon') }}/img/theme/team-4-800x800.jpg } @endif " class="rounded-circle">
                          </a>
                      </div>
                  </div>
              </div>
              <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                  <div class="d-flex justify-content-between">
                      <a href="mailto:{{$user->email}}" class="btn btn-sm btn-info float-left">{{ __('Email') }}</a>
                      <a href="{{route('user.index')}}" class="btn btn-sm btn-default float-right">{{ __('Back') }}</a>
                  </div>
              </div>
              <div class="card-body pt-0 pt-md-4">
                  <div class="text-center">
                      <h1>
                          {{ $user->name }}
                      </h1>
                      <div class="h5 font-weight-300">
                          <i class="ni location_pin mr-2"></i>{{ $user->fullname }}
                      </div>
                      <div class="h3 mt-4">
                          <i class="ni business_briefcase-24 mr-2"></i>@if ($user->position != null) {{{$user->position }}} @else <div class="font-weight-light">Position</div> @endif
                      </div>
                      <hr class="my-4" />
                      <div class="h3 font-weight-bold">@if ($user->contactnum != null) Phone Num: {{{ $user->contactnum }}} @endif</div>
                      <div class="h3 font-weight-bold">@if ($user->email != null) Email: {{{ $user->email }}} @endif</div>

                      <hr class="my-4" />
                      <p>@if ($user->desc != null) {{{ $user->desc }}} @else No Description. @endif</p>
                      
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
@endsection

<style>
  .required:after {
    content:" *";
    color: red;
  }
</style>