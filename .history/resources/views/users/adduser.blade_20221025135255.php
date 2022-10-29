

@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')

    <div class="header bg-primary pb-8 pt-md-5">
        <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$thismonth}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                @include('pages.condition.reportnewuser')
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row mb-0">
                                <div class="col">
                                    <h4 class="card-title text-uppercase text-muted mb-0">Performance</h4>
                                    <span class="h1 font-weight-bold mb-5">{{$performance}}%</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                        <i class="fas fa-percentage"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-1 mb-0 text-muted text-sm">
                              <span class="text-nowrap">Running Succesfully Production</span>
                          </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow bg-secondary">
                    <div class="card-header border-0 bg-dark ">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0 text-white">Admins</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('admin.create')}}" class="btn btn-sm btn-primary">Add Admin</a>
                            </div>
                        </div>
                    </div>
                    
                    <br>
                    <div class="col-12"></div>

                    <div class="mx-3 mb-3 ">
                        <livewire:user-table  searchable="name, email" exportable />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5 ">
        <div class="row ">
            <div class="col">
                <div class="card shadow bg-white">
                    <div class="card-header border-0  bg-white ">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Users</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('user.create')}}" class="btn btn-sm btn-primary">Add user</a>
                            </div>
                        </div>
                    </div>

                    <hr><br>
                    
                    <div class="col-12"></div>
                        <div class="mx-3 mb-3 ">
                            <livewire:admin-table  searchable="name, email" exportable />
                        </div>
                </div>
            </div>
        </div>
    </div>
 </div>
</div>
@endsection
@livewireScripts