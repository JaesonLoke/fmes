@include('layouts.headers.operatorheader')


    <!-- table -->
    <div class="header bg-danger pb-6 pt-md-8">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Emergency Stop</h6>
                
              </div>
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
                  <h3 class="mb-0">Fill in the details below...</h3>
                  <div class="col-md-10 text-right">
                    <a href="{{route('production')}}" class="btn btn-sm btn-neutral"><i class="fas fa-exit"></i> Back</a>
                  </div>
                </div>
              </div>
                <div class="table-responsive bg-secondary"  >
                  <table class="table align-items-center table-flush bg-secondary" >
                    <thead class="thead-light">
  
                      @if($errors->any())
  
                      <div class="alert alert-danger">
                        <ul>
                          @foreach($errors->all() as $error)
  
                            <li>{{ $error }}</li>
  
                          @endforeach
                        </ul>
                      </div>
  
                      @endif
                      
                      <form method="POST" action="{{route('production.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row m-3">
                          <label class="col-sm-2 col-label-form">Production Name</label>
                          <div class="col-sm-8">
                            <input type="text" name="production_name" class="form-control"/>
                          </div>
                        </div>
                        
                        <div class="text-center">
                          <input type="submit" class="btn btn-primary"/>
                        </div>
  
                        
                      </form>
                    </thead>
                  </table>
                  <div style="float:right; margin-right:15px; margin-bottom:20px">
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
  <!-- data table -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>



</body>

</html>