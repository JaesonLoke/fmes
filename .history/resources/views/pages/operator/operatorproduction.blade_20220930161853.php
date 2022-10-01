@include('layouts.headers.operatorheader')


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
              <h6 class="h2 text-white d-inline-block mb-0">Work Order</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('operator.production')}}">Production</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Work Order</li>
                </ol>
              </nav>
            </div>

            @if($message = Session::get('emergency'))

            <div class="alert alert-danger">
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
              <h3 class="mb-0">Production to be complete</h3>
              <div class="col-md-10 text-right">
              </div>
              </div>
            </div>
              <div class="table-responsive"  >
                <table class="table align-items-center table-flush" >
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Work Order</th>
                      <th scope="col" class="sort" data-sort="status">Status</th>
                      <th scope="col" class="sort" data-sort="operator">Planner</th>
                      <th scope="col" class="sort" data-sort="completion">Completion</th>
                      <th scope="col" class="sort" data-sort="due_date">Due Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody class="list" >
                    @if (count($productions) == 0)
                      <tr>
                        <td colspan="5" class="text-center">No records found.</td>
                      </tr>
                    @else

                    @foreach($productions as $row)
                    
                    @if ($row->status == "emergency")
                    <tr class="bg-danger text-white">
                    @elseif ($row->status == "new")
                    <tr class="bg-secondary text-black">
                    @else
                    <tr>
                    @endif
                    
                      <th scope="row" >
                        <div class="media align-items-center">
                          <div class="media-body">
                            @if ($row->status == "emergency")
                            <span class="name mb-0 text-sm" href="#"> {{ $row->workorder_name}} </span>
                            @else
                            <a class="name mb-0 text-sm" href="{{route('operator.product')}}?id={{ $row->id }}"> {{ $row->workorder_name}} </a>
                            @endif
                          </div>
                        </div>
                      </th>
                      <td>
                        <span class="badge badge-dot mr-4">
                          
                          @include('pages.condition.statusCon')
                          
                        </span>
                      </td>
                      <td>
                        <div class="avatar-group">
                          <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="{{$row->planner_id}}">
                            <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                          </a>
                        </div>
                      </td>
                      <td>
                        @include('pages.condition.PcompleCon')
                      </td>
                      <td>
                        @include('pages.condition.dueCon')
                      </td>
                      <td> 
                        @if ($row->status == "emergency")
                        <a href="{{route('operator.startwork',$row->id)}}" class="btn btn-sm btn-neutral"><i class="fas fa-play"></i></a>
                        @else
                        @endif

                        @if ($row->status == "emergency")
                        @else
                        <a href="#" data-toggle="modal" data-target="#ModelEmergency{{$row->id}}" class="btn btn-sm btn-danger"><i class="fas fa-exclamation-triangle "></i></a>
                        @endif

                      </td>
                      
                      @include('pages.model.emergency',['title'=>'operator.stopwork'])

                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
                
                <div style="float:right; margin-right:15px; margin-bottom:20px">
                {!! $productions->appends(request()->input())->links() !!}
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