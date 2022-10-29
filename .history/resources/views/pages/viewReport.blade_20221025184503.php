@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')
    <!-- table -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Report</h6>
              
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
              <h4>Report ID: {{$report->id}}</h4>
              <div class="col text-right">
                <a href="{{route('reporting')}}" class="btn btn-sm btn-neutral"><i class="fas fa-exit"></i> Back</a>
              </div>
              </div>
            </div>
              <div class="table-responsive bg-secondary text-center"  >
                <table class="table align-items-center table-flush" >
                  <thead class="thead-light">
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Report title</label>
                        <div class="col-sm-8">
                          <input type="text"  class="form-control text-center bg-white text-dark" value="{{$report->category}}" readonly/>
                        </div>
                      </div>
                      
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Work Order ID</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control text-center bg-white text-dark" value="{{$report->WorkID}}" readonly/>
                        </div>

                        <label class="col-sm-2 col-label-form">Product ID</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control text-center bg-white text-dark" value="{{$report->ProductID}}" readonly/>
                        </div>
                      </div>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Reporter</label>
                        <div class="col-sm-3">
                          <input type="text"  class="form-control text-center bg-white text-dark" value="{{$report->ReporterID}}" readonly/>
                        </div>

                        <label class="col-sm-2 col-label-form">Reported Date</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control text-center bg-white text-dark" value="{{$report->created_at}}" readonly/>
                        </div>
                      </div>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Details</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control text-center bg-white text-dark" value="{{$report->detail}}" readonly/>
                        </div>
                      </div>


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
@endsection