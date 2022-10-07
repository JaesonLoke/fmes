@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')
        <!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">Dashboard</a>
        
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">Admin Admin</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Settings</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>Activity</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>Support</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>    

    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
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
                                    <span class="h2 font-weight-bold mb-0">2,356</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                                <span class="text-nowrap">Since last week</span>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                    <span class="h2 font-weight-bold mb-0">49,65%</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-percent"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                <span class="text-nowrap">Since last month</span>
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
                <div class="card shadow bg-dark">
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
                    
                    <div class="col-12">
                                            </div>

                    <div class="table-responsive ">
                        <table class="table align-items-center table-flush text-white">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($admins) == 0)
                                    <tr>
                                        <td colspan="5" class="text-center">No records found.</td>
                                    </tr>
                                    @else

                                    @foreach ( $admins as $row )
                                        
                                    <tr>
                                        <td>{{$row->name}}</td>
                                        <td>
                                            <a href="mailto:{{$row->email}}">{{$row->email}}</a>
                                        </td>
                                        <td>{{$row->created_at}}</td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-icon-only text-light" href="{{route('admin.view',$row->id)}}" role="button" >
                                                <i class="fas fa-eye"></i>
                                            </a>
                                                
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                            </tbody>
                        </table>
                        <div style="float:right; margin-right:15px; margin-bottom:20px">
                            {!! $admins->appends(request()->input())->links() !!}
                            </div>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col">
                <div class="card shadow bg-white">
                    <div class="card-header border-0 bg-white ">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Users</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('user.create')}}" class="btn btn-sm btn-primary">Add user</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                                            </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush ">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($users) == 0)
                                    <tr>
                                        <td colspan="5" class="text-center">No records found.</td>
                                    </tr>
                                    @else

                                    @foreach ( $users as $row )
                                        
                                    <tr>
                                        <td>{{$row->name}}</td>
                                        <td>
                                            <a href="mailto:{{$row->email}}">{{$row->email}}</a>
                                        </td>
                                        <td>{{$row->created_at}}</td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-icon-only" href="{{route('admin.view',$row->id)}}" role="button" >
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                            </tbody>
                        </table>
                        <div style="float:right; margin-right:15px; margin-bottom:20px">
                            {!! $users->appends(request()->input())->links() !!}
                            </div>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
</div>



    
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
            
    <!-- Argon JS -->
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
</body></html>
