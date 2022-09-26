@extends('layouts.pages')

@section('content')

    <!-- table -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Edit Work Order details for Production {{$work->production_id}}</h6>
              
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
              <div class="row md-0"
              <h3 class="mb-0">Fill in the details below...</h3>
              <div class="col-md-10 text-right">
                <a href="{{route('workorder')}}?id={{$work->production_id}}" class="btn btn-sm btn-neutral"><i class="fas fa-exit"></i> Back</a>
              </div>
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
                    
                    <form method="POST" action="{{route('work.update',$work->id)}}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Work Order Name</label>
                        <div class="col-sm-8">
                          <input type="text" name="workorder_name" class="form-control" value="{{$work->workorder_name}}"/>
                        </div>
                      </div>
                      
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form">Due Date</label>
                        <div class="col-sm-8">
                          <input type="date" name="due_date" class="form-control" value="{{$work->due_date}}"/>
                        </div>
                      </div>

                      <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Update" />
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
@endsection