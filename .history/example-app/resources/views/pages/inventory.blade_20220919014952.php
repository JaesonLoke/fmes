<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Production</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-dark">
  <!-- Sidenav -->
  
  @include('layouts.navbars.sidebar')

  <!-- Main content -->
  <div class="main-content" id="panel">    
    <!-- Top header -->
    @include('layouts.headers.header')

    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid" style="width: auto;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%)">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Inventory</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Components</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Icons</li>
                </ol>
              </nav>
            </div>
            
          </div>
        
      
      <div class="row align-items-center">
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Usage of Items</h5>
                            <span class="h2 font-weight-bold mb-0">2,356</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
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
                          <h5 class="card-title text-uppercase text-muted mb-0">Waste</h5>
                          <span class="h2 font-weight-bold mb-0">30.62%</span>
                      </div>
                      <div class="col-auto">
                          <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                              <i class="fas fa-trash"></i>
                          </div>
                      </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                      <span class="text-success mr-2"><i class="fas fa-arrow-down"></i> 12%</span>
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
                            <h5 class="card-title text-uppercase text-muted mb-0">Shortage and Delay</h5>
                            <span class="h2 font-weight-bold mb-0">49,65%</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                <i class="fas fa-percent"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div>
            </div>
          </div>
       </div>
      </div>
    </div>
  </div>
      

    

    <!-- Page content -->
    <div class="container-fluid mt--5">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">

              <div class=" text-right">
                <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> New</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Items</th>
                      <th scope="col" class="sort" data-sort="status">Pictures</th>
                      <th scope="col">Stocks</th>
                      <th scope="col" class="sort" data-sort="completion">Last updates</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          
                          <div class="media-body">
                            <span class="name mb-0 text-sm">Argon Design System</span>
                          </div>
                        </div>
                      </th>
                      <td>
                        <img src="../argon/img/theme/spanner.jpg" height="100px"/>
                      </td>
                      <td>
                        <div class="avatar-group">
                          
                          </a>
                          <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                            <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                          </a>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <span class="completion mr-2">60%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="media-body">
                            <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>
                          </div>
                        </div>
                      </th>
                      <td>
                        <img src="../argon/img/theme/scissors.jpg" height="100px"/>
                      </td>
                      <td>
                        <div class="avatar-group">
                          <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                            <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                          </a>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <span class="completion mr-2">100%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="media-body">
                            <span class="name mb-0 text-sm">Black Dashboard</span>
                          </div>
                        </div>
                      </th>
                      <td>
                        <img src="../argon/img/theme/klein.jpg" height="100px"/>
                      </td>
                      <td>
                        <div class="avatar-group">
                          <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                            <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                          </a>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <span class="completion mr-2">72%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="media-body">
                            <span class="name mb-0 text-sm">React Material Dashboard</span>
                          </div>
                        </div>
                      </th>
                      <td>
                        <img src="../argon/img/theme/hammer.jpg" height="100px"/>
                      </td>
                      <td>
                        <div class="avatar-group">
                          <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                            <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                          </a>
                          
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <span class="completion mr-2">90%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="media-body">
                            <span class="name mb-0 text-sm">Vue Paper UI Kit PRO</span>
                          </div>
                        </div>
                      </th>
                      <td>
                        <img src="../argon/img/theme/measure.jpg" height="100px"/>
                      </td>
                      <td>
                        <div class="avatar-group">
                          <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                            <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                          </a>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <span class="completion mr-2">100%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      <!-- Footer -->
      @include('layouts.footers.guest')


  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/clipboard/dist/clipboard.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>