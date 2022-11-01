

@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')

    <div class="header bg-primary pb-8 pt-md-8">
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
                    

                    <div class="table-responsive bg-white ">
                        <table class="table align-items-center table-flush  ui celled table text-white" id="data-table">
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
                                        <td>{{$row->created_at->format('d M Y')}}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5 ">
        <div class="row ">
            <div class="col">
                <div class="card shadow ">
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
                    <div class="table-responsive ">
                        <table class="table align-items-center table-flush" id="data-table">
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
                                        <td>{{$row->created_at->format('d M Y')}}</td>
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
                        
                </div>
            </div>
        </div>
    </div>
 </div>
</div>
@endsection


@push('script')
<script>
    $(function () {
        $('#data-table').DataTable({

        });
    });
</script>
@endpush