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

    <!-- table -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Add New Product for the Order</h6>
              
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
              <h3 class="mb-0">Fill in the details below...</h3>
            </div>
              <div class="table-responsive"  >
                <table class="table align-items-center table-flush" >
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
                    
                    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Product Name</label>
                        <div class="col-sm-8">
                          <input type="text" name="product_name" class="form-control"/>
                        </div>
                      </div>
                      
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Due Date</label>
                        <div class="col-sm-8">
                          <input type="date" name="due_date" class="form-control"/>
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