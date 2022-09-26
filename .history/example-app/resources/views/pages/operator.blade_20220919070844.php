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

<body>
  <!-- Sidenav -->
  
  @include('layouts.navbars.sidebar')

  <!-- Main content -->
  <div class="main-content" id="panel">    
    <!-- Top header -->
    @include('layouts.headers.header')


    @include('users.partials.header', [
      'title' => __('Hello') . ' '. auth()->user()->name,
      'description' => __('This is your operator page. You can see the progress you\'ve made with your work and manage your assigned tasks.'),
      'class' => 'col-lg-7'
  ])   

    <!-- Page content -->
    <div class="container-fluid mt--6 bg-dark">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Production</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Production Line</th>
                      <th scope="col" class="sort" data-sort="status">Status</th>
                      <th scope="col">Planner</th>
                      <th scope="col" class="sort" data-sort="completion">Completion</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                          </a>
                          <div class="media-body">
                            <a href="{{ route('workorder') }}" class="name mb-0 text-sm">Argon Design System</a>
                          </div>
                        </div>
                      </th>
                      <td>
                        <span class="badge badge-dot mr-4">
                          <i class="bg-warning"></i>
                          <span class="status">pending</span>
                        </span>
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
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Image placeholder" src="../assets/img/theme/angular.jpg">
                          </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>
                          </div>
                        </div>
                      </th>
                      <td>
                        <span class="badge badge-dot mr-4">
                          <i class="bg-success"></i>
                          <span class="status">completed</span>
                        </span>
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
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Image placeholder" src="../assets/img/theme/sketch.jpg">
                          </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">Black Dashboard</span>
                          </div>
                        </div>
                      </th>
                      <td>
                        <span class="badge badge-dot mr-4">
                          <i class="bg-danger"></i>
                          <span class="status">delayed</span>
                        </span>
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
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Image placeholder" src="../assets/img/theme/react.jpg">
                          </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">React Material Dashboard</span>
                          </div>
                        </div>
                      </th>
                      <td>
                        <span class="badge badge-dot mr-4">
                          <i class="bg-info"></i>
                          <span class="status">on schedule</span>
                        </span>
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
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Image placeholder" src="../assets/img/theme/vue.jpg">
                          </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">Vue Paper UI Kit PRO</span>
                          </div>
                        </div>
                      </th>
                      <td>
                        <span class="badge badge-dot mr-4">
                          <i class="bg-success"></i>
                          <span class="status">completed</span>
                        </span>
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