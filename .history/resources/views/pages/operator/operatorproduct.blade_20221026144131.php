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
                    @if (DB::table('users')->where('id',$row->staff_id)->value('image') == null)
                    <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                    @else
                    <img src="{{route('user.fetch',$row->staff_id)}}" class="avatar rounded-circle">
                    @endif
                  </div>
                  <div class="col ml--2">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        @if (DB::table('users')->where('id',$row->staff_id)->value('fullname') == null)
                        <h4 class="mb-0 text-sm">{{DB::table('users')->where('id',$row->staff_id)->value('name')}}</h4>
                        @else
                        <h4 class="mb-0 text-sm">{{DB::table('users')->where('id',$row->staff_id)->value('fullname')}}</h4>

                        @endif
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
                        @if (DB::table('users')->where('id',$imgid)->value('image') == null)
                        <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg" class="avatar avatar-sm rounded-circle">
                        @else
                        <img src="{{route('user.fetch','1')}}" class="avatar avatar-sm rounded-circle">
                        @endif
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
                  <a href="{{ route('operator.production') }}" class="dropdown-item">
                    <i class="fa fa-wrench"></i>
                    <span>{{ __('Production') }}</span>
                </a>
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



    @include('users.partials.header', [
      'title' => __('Hello') . ' '. auth()->user()->name,
      'description' => __('This is your operator page. You can see the progress you\'ve made with your work and manage your assigned tasks.'),
      'class' => 'col-lg-7'
  ])   



    <!-- Page content -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Product</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('operator.workorder')}}?id={{ DB::table('workorders')->where('id', $_GET['id'])->value('production_id'); }}">Work Order</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>
              </nav>
            </div>
            
            @if($message = Session::get('start'))

            <div class="alert alert-success">
              {{ $message }}
            </div>

            @elseif($message = Session::get('emergency'))

            <div class="alert alert-danger">
              {{ $message }}
            </div>

            @elseif($message = Session::get('done'))

            <div class="alert alert-success">
              {{ $message }}
            </div>

            @endif
          </div>
        </div>
      </div>
    </div>


    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row justify-content-center"  >
        <div class=" col " >
          <div class="card " >
            <!--table header-->
            <div class="card-header bg-transparent">
              <div class="row m-0">
              <h3 class="mb-0">Products to be complete</h3>
              <div class="col text-right">
                <a href="{{route('operator.workorder')}}?id={{DB::table('workorders')->where('id', $_GET['id'])->value('production_id');}}" class="btn btn-sm btn-neutral"><i class="fas fa-exit"></i> Back</a>
              </div>
              </div>
            </div>
              <div class="table-responsive"  >
                <table class="table align-items-center table-flush" >
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Products</th>
                      <th scope="col" class="sort" data-sort="status">Status</th>
                      <th scope="col" class="sort" data-sort="operator">Planner</th>
                      <th scope="col" class="sort" data-sort="completion">Completion</th>
                      <th scope="col" class="sort" data-sort="due_date">Due Date</th>
                      <th scope="col" class="sort" data-sort="due_date">Remarks</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody class="list" >
                    @if (count($products) == 0)
                      <tr>
                        <td colspan="5" class="text-center">No records found.</td>
                      </tr>
                    @else

                    @foreach($products as $row)
                    
                    @if ($row->status == "emergency")
                    <tr class="bg-danger text-white">
                    @else
                    <tr>
                    @endif
                    
                      <th scope="row" >
                        <div class="media align-items-center">
                          <div class="media-body">
                            <span class="name mb-0 text-sm"> {{ $row->product_name}} </span>
                          </div>
                        </div>
                      </th>
                      <td>
                          
                          @include('pages.condition.statusCon')
                          
                        </span>
                      </td>
                      <td>
                        @if ($row->operator_id == null)
                        -

                        @else
                        <div class="avatar-group">
                          <a href="{{route('operator.view',$row->operator_id) }}" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="{{DB::table('users')->where('id',$row->operator_id)->value('fullname')}}">
                            <img alt="Image placeholder" src="{{route('user.fetch', $row->operator_id)}}">
                          </a>
                        </div>
                        @endif
                      </td>
                      <td>
                        @include('pages.condition.compleCon')
                      </td>
                      <td>
                        @include('pages.condition.dueCon')
                      </td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#ModelRemark{{$row->id}}" class="btn btn-sm btn-neutral "><i class="fa fa-search"></i></a>
                      </td>
                      <td> 
                        @if ($row->status == "Running")
                        @else
                        <a href="{{route('operator.startproduct',$row->id)}}" class="btn btn-sm btn-neutral"><i class="fas fa-play"></i></a>
                        @endif

                        @if ($row->status == "new" || $row->status == "emergency")
                      @else
                      <a href="{{route('operator.endproduct',$row->id)}}" class="btn btn-sm btn-neutral"><i class="fas fa-stop"></i></a>
                      @endif
                      @if ($row->status == "emergency")

                      @else
                      <a href="#" data-toggle="modal" data-target="#ModelEmergency{{$row->id}}" class="btn btn-sm btn-danger"><i class="fas fa-exclamation-triangle "></i></a>
                      @endif
                      </td>
                      
                      @include('pages.model.emergency',['title'=>'operator.stopproduct'])
                      @include('pages.model.remark',['title'=>'operator.stopproduct'])

                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
                
                <div style="float:right; margin-right:15px; margin-bottom:20px">
                {!! $products->appends(request()->input())->links() !!}
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>


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