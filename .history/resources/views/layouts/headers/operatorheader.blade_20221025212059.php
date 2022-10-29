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

  @auth()
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  @endauth

  <!-- Main content -->
  <div class="main-content" id="panel">    
<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark bg-dark" id="navbar-main">
  <div class="container-fluid">
      <!-- Brand -->
      @if(str_contains(url()->current(), '/home'))
      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
      @else
      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"></a>
      @endif
      
      <ul class="navbar-nav align-items-center d-none d-md-flex">

      <!--Notification-->
      <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
            <!-- Dropdown header -->
            <div class="px-3 py-3">
              <h6 class="text-sm text-muted m-0">Notifications </h6>
            </div>

            <?php 
            use App\Models\Notification;
            $notifications = Notification::latest()->Paginate(5);
            ?>

            <!-- List group -->
            <div class="list-group list-group-flush">
              @if (count($notifications) == 0)
              <hr><br>
                      <h4 class="text-center">No records found.</h4>
                      <br><br>
                  @else

                  @foreach($notifications as $row)
              <a href="#!" class="list-group-item list-group-item-action">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <!-- Avatar -->
                    @if ($row->reporter_id == null)
                    <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                    @else
                    <img src="{{route('user.fetch',$row->reporter_id)}}" class="avatar rounded-circle">
                    @endif
                  </div>
                  <div class="col ml--2">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h4 class="mb-0 text-sm">{{DB::table('users')->where('id',$row->reporter_id)->value('fullname')}}</h4>
                      </div>
                      <div class="text-right text-muted">
                        <small>
                          @if ($row->created_at > carbon\Carbon::now()->subHour(1)  )
                            
                          {{ carbon\Carbon::parse($row->created_at)->diffInMinutes(carbon\Carbon::now()) }} Minutes Ago
                          
                          @else
                          {{ carbon\Carbon::parse($row->created_at)->diffInhours(carbon\Carbon::now()) }} Hours Ago
                          
                          @endif
                        </small>
                      </div>
                    </div>
                    <p class="text-sm mb-0">{{$row->detail}}</p>
                  </div>
                </div>
              </a>
              @endforeach
            </div>
            <!-- View all -->
            <div class="dropdown-item text-center text-primary font-weight-bold py-3">{!! $notifications->appends(request()->input())->links() !!}</div>
          </div>
          @endif
        </li>

      <!-- User -->
      <?php
      use App\Models\User;
        $imgid = User::where('id',auth()->user()->id)->first()->value('id');
      ?>
      
          <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="media align-items-center">
                      <span class="avatar avatar-sm rounded-circle">
                          <img src="{{route('user.fetch', $imgid)}}">
                      </span>
                      <div class="media-body ml-2 d-none d-lg-block">
                          <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                      </div>
                  </div>
              </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                  <div class=" dropdown-header noti-title">
                      <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                  </div>
                  <a href="{{ route('profile.edit') }}" class="dropdown-item">
                      <i class="ni ni-single-02"></i>
                      <span>{{ __('My profile') }}</span>
                  </a>
                  <a href="#" class="dropdown-item">
                      <i class="ni ni-settings-gear-65"></i>
                      <span>{{ __('Settings') }}</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                      <i class="ni ni-user-run"></i>
                      <span>{{ __('Logout') }}</span>
                  </a>
              </div>
          </li>
      </ul>
  </div>
</nav>

