@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')
    <!-- table -->
    <div class="header bg-primary pb-6 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Product Details</h6>
              
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
              <h4>Work Order ID: {{$product->workorder_id}}</h4>
              <div class="col text-right">
                <a href="{{route('product')}}?id={{$product->workorder_id}}" class="btn btn-sm btn-neutral"><i class="fas fa-exit"></i> Back</a>
              </div>
              </div>
            </div>
              <div class="table-responsive text-center bg-secondary"  >
                <table class="table align-items-center table-flush" >
                  <thead class="thead-light">
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Product Name</label>
                        <div class="col-sm-8">
                          <input type="text" name="product_name" class="form-control text-center bg-white" value="{{$product->product_name}}" readonly/>
                        </div>
                      </div>
                      
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Due Date</label>
                        <div class="col-sm-3">
                          <input type="date" name="due_date" class="form-control text-center bg-white" value="{{$product->due_date}}" readonly/>
                        </div>

                        <label class="col-sm-2 col-label-form">Created Date</label>
                        <div class="col-sm-3">
                          <input type="date" name="createdate" class="form-control text-center bg-white" value="{{$product->created_at->toDateString()}}" readonly/>
                        </div>
                      </div>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Status</label>
                        <div class="col-sm-3">
                          @include('pages.condition.viewproductstatus')                        
                        </div>

                        <label class="col-sm-2 col-label-form">Completion</label>
                        <div class="col-sm-3 ">
                          <div class="progress " style="height:15px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" 
                              aria-valuenow="{{$value = DB::table('products')->select(DB::raw('AVG(completion/quantity) as total'))->where('id',$product->id)->value("total")*100}} aria-valuemin="0" aria-valuemax="100" style="width: {{$value}}%;">
                            </div>
                            <span class="completion mr-2"> {{round($value,0)}}%</span>
                          </div>
                        </div>
                      </div>

                      
                      <br>
                      <hr>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Quantity Required</label>
                        <div class="col-sm-3">
                          <input type="text" name="quantity" class="form-control text-center bg-white" value="{{$product->quantity}}" readonly/>
                        </div>

                        <label class="col-sm-2 col-label-form">Quantity Completed</label>
                        <div class="col-sm-3">
                          <input type="text" name="quantity" class="form-control text-center bg-white" value="{{$product->completion}}" readonly/>
                        </div>
                      </div>


                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Remark</label>
                        <div class="col-sm-8">
                          <textarea name="remark" class="form-control text-center bg-white" readonly></textarea>
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