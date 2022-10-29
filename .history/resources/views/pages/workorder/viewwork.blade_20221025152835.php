@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')

    <!-- table -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Work Order Details</h6>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    


    <!-- Page content -->
    <div class="container-fluid mt--6 ">
      <div class="row justify-content-center"  >
        <div class=" col " >
          <div class="card " >
            <!--table header-->
            <div class="card-header bg-transparent">
              <div class="row m-0">
              <h4>Production ID: {{$work->production_id}}</h4>
              <div class="col-md-10 text-right">
                <a href="{{route('workorder')}}?id={{$work->production_id}}" class="btn btn-sm btn-neutral"><i class="fas fa-exit"></i> Back</a>
              </div>
              </div>
            </div>
              <div class="table-responsive "  >
                <table class="table align-items-center table-flush " >
                  <thead class="thead-light">
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Product Name</label>
                        <div class="col-sm-8">
                          <input type="text" name="product_name" class="form-control text-center text-dark" value="{{$work->workorder_name}}" readonly/>
                        </div>
                      </div>
                      
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Due Date</label>
                        <div class="col-sm-3">
                          <input type="date" name="due_date" class="form-control text-center text-dark" value="{{$work->due_date}}" readonly/>
                        </div>

                        <label class="col-sm-2 col-label-form">Created Date</label>
                        <div class="col-sm-3">
                          <input type="date" name="createdate" class="form-control text-center text-dark" value="{{$work->created_at->toDateString()}}" readonly/>
                        </div>
                      </div>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Status</label>
                        <div class="col-sm-3 text-center" >
                          <span class='badge badge-pill badge-info' style="width:200px; height:30px">{{$work->status}}</span>
                        </div>

                        <label class="col-sm-2 col-label-form">Planner</label>
                        <div class="col-sm-3">
                          <div class="avatar-group">
                            <a href="{{route('admin.view',$work->planner_id) }}" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="{{$row->planner_id}}">
                              <img alt="Image placeholder" src="{{route('user.fetch', $work->planner_id)}}">
                            </a>
                          </div>
                          <input type="text" name="operator" class="form-control text-center text-dark" value="{{DB::table('users')->where('id',$work->planner_id)->value('fullname')}}" readonly/>
                        </div>
                      </div>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Remark</label>
                        <div class="col-sm-8">
                          <textarea name="remark" class="form-control text-center text-dark" value="{{$work->operator_id}}" readonly></textarea>
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