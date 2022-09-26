@extends('layouts.app')
<body class="bg-dark">

@section('content')


<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row mt-3">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                                    <span class="h2 font-weight-bold mb-0">350,897</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
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
                                    <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                                    <span class="h2 font-weight-bold mb-0">924</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                <span class="text-nowrap">Since yesterday</span>
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
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Reported Cases</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Month</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Week</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Total reports</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </div>

    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
          <div class=" col ">
            <div class="card">
              <div class="card-header bg-transparent">
                <span>Reports</span>
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="sort" data-sort="name">Report case</th>
                        <th scope="col" class="sort" data-sort="status">Production line</th>
                        <th scope="col">Reported by</th>
                        <th scope="col" class="sort" data-sort="completion">Date reported</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            
                            <div class="media-body">
                              <span class="name mb-0 text-sm">Spanner Run Out</span>
                            </div>
                          </div>
                        </th>
                        <td>
                            <span class="name mb-0 text-sm">Line 2</span>
                        </td>
                        <td>
                            <div class="avatar-group">
                                <r
                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                              <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                            </a>
                          </div>
                          
                        </td>
                        <td>
                          <span class="name mb-0 text-sm">19 Sep 2022</span>
                        </td>
                        <td class="text-right">
                          <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-edit"></i></a>
                            <a href="#" data-toggle="modal" data-target="#" class="btn btn-sm btn-neutral"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            <div class="media-body">
                              <span class="name mb-0 text-sm">Scissors</span>
                            </div>
                          </div>
                        </th>
                        <td>
                          <img src="../argon/img/theme/scissors.jpg" height="100px"/>
                        </td>
                        <td>
                          <span class="name mb-0 text-danger text-sm">10</span>
                        </td>
                        <td>
                          <span class="name mb-0 text-sm">21 Sep 2022</span>
                        </td>
                        <td class="text-right">
                          <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-edit"></i></a>
                            <a href="#" data-toggle="modal" data-target="#" class="btn btn-sm btn-neutral"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            <div class="media-body">
                              <span class="name mb-0 text-sm">Klein</span>
                            </div>
                          </div>
                        </th>
                        <td>
                          <img src="../argon/img/theme/klein.jpg" height="100px"/>
                        </td>
                        <td>
                          <span class="name mb-0 text-sm">520</span>
                        </td>
                        <td>
                          <span class="name mb-0 text-sm">9 Oct 2022</span>
                        </td>
                        <td class="text-right">
                          <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-edit"></i></a>
                            <a href="#" data-toggle="modal" data-target="#" class="btn btn-sm btn-neutral"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            <div class="media-body">
                              <span class="name mb-0 text-sm">Hammer</span>
                            </div>
                          </div>
                        </th>
                        <td>
                          <img src="../argon/img/theme/hammer.jpg" height="100px"/>
                        </td>
                        <td>
                          <span class="name mb-0 text-sm">3050</span>
                        </td>
                        <td>
                          <span class="name mb-0 text-sm">19 Sep 2022</span>
                        </td>
                        <td class="text-right">
                          <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-edit"></i></a>
                            <a href="#" data-toggle="modal" data-target="#" class="btn btn-sm btn-neutral"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            <div class="media-body">
                              <span class="name mb-0 text-sm">Measurement</span>
                            </div>
                          </div>
                        </th>
                        <td>
                          <img src="../argon/img/theme/measure.jpg" height="100px"/>
                        </td>
                        <td>
                          <span class="name mb-0 text-sm">1000</span>
                        </td>
                        <td>
                          <span class="name mb-0 text-sm">10 Sep 2022</span>
                        </td>
                        <td class="text-right">
                          <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-edit"></i></a>
                            <a href="#" data-toggle="modal" data-target="#" class="btn btn-sm btn-neutral"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush