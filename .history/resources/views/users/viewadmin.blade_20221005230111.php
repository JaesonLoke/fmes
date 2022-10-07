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
                              <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">
                          </a>
                      </div>
                  </div>
              </div>
              <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                  <div class="d-flex justify-content-between">
                      <a href="mailto:{{$admin->email}}" class="btn btn-sm btn-info float-left">{{ __('Email') }}</a>
                      <a href="" class="btn btn-sm btn-default float-right">{{ __('Back') }}</a>
                  </div>
              </div>
              <div class="card-body pt-0 pt-md-4">
                  <div class="row">
                      <div class="col">
                      </div>
                  </div>
                  <div class="text-center">
                      <h3>
                          {{ $admin->name }}<span class="font-weight-light">, 27</span>
                      </h3>
                      <div class="h5 font-weight-300">
                          <i class="ni location_pin mr-2"></i>{{ __('Bucharest, Romania') }}
                      </div>
                      <div class="h5 mt-4">
                          <i class="ni business_briefcase-24 mr-2"></i>{{ __('Solution Manager - Creative Tim Officer') }}
                      </div>
                      <div>
                          <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
                      </div>
                      <hr class="my-4" />
                      <p>{{ __('Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.') }}</p>
                      <a href="#">{{ __('Show more') }}</a>
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