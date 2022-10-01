@extends('layouts.pages')

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
              <div class="col-md-10 text-right">
                <a href="{{route('reporting')}}" class="btn btn-sm btn-neutral"><i class="fas fa-exit"></i> Back</a>
              </div>
              </div>
            </div>
              <div class="table-responsive"  >
                <table class="table align-items-center table-flush" >
                  <thead class="thead-light">
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Report title</label>
                        <div class="col-sm-8">
                          <input type="text"  class="form-control text-center" value="{{$report->title}}" readonly/>
                        </div>
                      </div>
                      
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Work ID</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control text-center" value="{{$report->WorkID}}" readonly/>
                        </div>

                        <label class="col-sm-2 col-label-form">Product ID</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control text-center" value="{{$report->ProductID}}" readonly/>
                        </div>
                      </div>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Reporter</label>
                        <div class="col-sm-3">
                          <input type="text" name="status" class="form-control text-center" value="{{$report->ReporterID}}" readonly/>
                        </div>

                        <label class="col-sm-2 col-label-form">Reported Date</label>
                        <div class="col-sm-3">
                          <input type="date" name="com" class="form-control text-center" value="date('d-m-Y', strtotime($report->created_at}}));" readonly/>
                        </div>
                      </div>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Operator</label>
                        <div class="col-sm-3">
                          <input type="text" name="operator" class="form-control text-center" value="{{$report->operator_id}}" readonly/>
                        </div>

                        <label class="col-sm-2 col-label-form">Quantity</label>
                        <div class="col-sm-3">
                          <input type="text" name="quantity" class="form-control text-center" value="{{$report->quantity}}" readonly/>
                        </div>
                      </div>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Remark</label>
                        <div class="col-sm-8">
                          <textarea name="remark" class="form-control text-center" value="{{$report->operator_id}}" readonly></textarea>
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