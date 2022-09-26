@extends('layouts.pages')

@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Work Order</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('production')}}">Production</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Work Order</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{route('work.create')}}?id={{ $_GET['id'] }}" class="btn btn-sm btn-neutral"><i class="fas fa-plus"></i> New</a>
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
              <h3 class="mb-0">Products to be complete</h3>
              <div class="col-md-10 text-right">
                <a href="{{route('production')}}" class="btn btn-sm btn-neutral"><i class="fas fa-exit"></i> Back</a>
              </div>
            </div>
            </div>
              <div class="table-responsive"  >
                <table class="table align-items-center table-flush" >
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Products</th>
                      <th scope="col" class="sort" data-sort="status">Status</th>
                      <th scope="col" class="sort" data-sort="operator">Operator</th>
                      <th scope="col" class="sort" data-sort="completion">Completion</th>
                      <th scope="col" class="sort" data-sort="due_date">Due Date</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="list" >
                    @if (count($    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Work Order</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('production')}}">Production</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Work Order</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{route('work.create')}}?id={{ $_GET['id'] }}" class="btn btn-sm btn-neutral"><i class="fas fa-plus"></i> New</a>
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
              <h3 class="mb-0">Products to be complete</h3>
              <div class="col-md-10 text-right">
                <a href="{{route('production')}}" class="btn btn-sm btn-neutral"><i class="fas fa-exit"></i> Back</a>
              </div>
            </div>
            </div>
              <div class="table-responsive"  >
                <table class="table align-items-center table-flush" >
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Products</th>
                      <th scope="col" class="sort" data-sort="status">Status</th>
                      <th scope="col" class="sort" data-sort="operator">Operator</th>
                      <th scope="col" class="sort" data-sort="completion">Completion</th>
                      <th scope="col" class="sort" data-sort="due_date">Due Date</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="list" >
                    @if (count($works) == 0)
                      <tr>
                        <td colspan="5" class="text-center">No records found.</td>
                      </tr>
                    @else

                    @foreach($works as $row)
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="media-body">
                            <a class="name mb-0 text-sm" href="{{route('product')}}?id={{ $row->id }}"> {{ $row->workorder_name}} </a>
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
                        @include('pages.condition.compleCon')
                      </td>
                      <td>
                        @include('pages.condition.dueCon')
                      </td>
                      <td class="text-right">
                          <a href="{{route('work.show',$row->id)}}" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i></a>
                          <a href="{{route('work.edit',$row->id)}}" class="btn btn-sm btn-neutral"><i class="fas fa-edit"></i></a>
                          <a href="#" data-toggle="modal" data-target="#ModelDelete{{$row->id}}" class="btn btn-sm btn-neutral"><i class="fas fa-trash"></i></a>
                      </td>
                      @include('pages.model.delete',['title'=>'product.destroy','delete'=>'Work Order'])
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
                
                <div style="float:right; margin-right:15px; margin-bottom:20px">
                {!! $works->appends(request()->input())->links() !!}
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>) == 0)
                      <tr>
                        <td colspan="5" class="text-center">No records found.</td>
                      </tr>
                    @else

                    @foreach($works as $row)
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="media-body">
                            <a class="name mb-0 text-sm" href="{{route('product')}}?id={{ $row->id }}"> {{ $row->workorder_name}} </a>
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
                        @include('pages.condition.compleCon')
                      </td>
                      <td>
                        @include('pages.condition.dueCon')
                      </td>
                      <td class="text-right">
                          <a href="{{route('work.show',$row->id)}}" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i></a>
                          <a href="{{route('work.edit',$row->id)}}" class="btn btn-sm btn-neutral"><i class="fas fa-edit"></i></a>
                          <a href="#" data-toggle="modal" data-target="#ModelDelete{{$row->id}}" class="btn btn-sm btn-neutral"><i class="fas fa-trash"></i></a>
                      </td>
                      @include('pages.model.delete',['title'=>'product.destroy','delete'=>'Work Order'])
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
                
                <div style="float:right; margin-right:15px; margin-bottom:20px">
                {!! $works->appends(request()->input())->links() !!}
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  @endsection