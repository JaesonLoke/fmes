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
              <h6 class="h2 text-white d-inline-block mb-0">Product</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('operator.index')}}"><i class="fas fa-home"></i></a></li>
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
              <div class="table-responsive pt-3 pb-3"  >
                <table class="table align-items-center table-flush data-table" >
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
                    
                    <tr>
                    
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
                        <a href="#" data-toggle="modal" data-target="#ModelRemark{{$row->id}}" class="btn btn-sm btn-neutral ">
                          <i class="fa fa-search"></i></a>
                      </td>
                      <td> 
                        @if ($row->status == "Running")
                        @else
                        <a href="{{route('operator.startproduct',$row->id)}}" class="btn btn-sm btn-neutral">
                          <i class="fas fa-play"></i></a>
                        @endif

                        @if ($row->status == "new" || $row->status == "emergency")
                      @else
                      <a href="{{route('operator.endproduct',$row->id)}}" class="btn btn-sm btn-neutral">
                        <i class="fas fa-stop"></i></a>
                      @endif
                      @if ($row->status == "emergency")

                      @else
                      <a href="#" data-toggle="modal" data-target="#ModelEmergency{{$row->id}}" class="btn btn-sm btn-danger">
                        <i class="fas fa-exclamation-triangle "></i></a>
                      @endif
                      </td>
                      
                      @include('pages.model.emergency',['title'=>'operator.stopproduct'])
                      @include('pages.model.remark',['title'=>'operator.stopproduct'])

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
  <!-- data table -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

  <script>

      $(function () {
          $('.data-table').DataTable({
            "aaSorting": []
          });
      });
  </script>
  
</body>

</html>