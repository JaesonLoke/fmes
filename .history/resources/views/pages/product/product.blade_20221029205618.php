@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')

    <!-- table -->
    <div class="header bg-primary pb-6 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Product</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  
                  <li class="breadcrumb-item text-primary"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item text-primary"><a href="{{route('workorder')}}?id={{ DB::table('workorders')->where('id', $_GET['id'])->value('production_id'); }}">Work Order</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{route('product.create')}}?id={{ $_GET['id'] }}" class="btn btn-sm btn-neutral"><i class="fas fa-plus"></i> New</a>
            </div>

            @if($message = Session::get('success'))

            <div class="alert alert-success">
              {{ $message }}
            </div>

            @endif
          </div>
        </div>
      </div>
    </div>


    <!-- Page content -->
    <div class="container-fluid mt--6 ">
      <div class="row justify-content-center "  >
        <div class=" col " >
          <div class="card " >
            <!--table header-->
            <div class="card-header bg-transparent">
              <div class="row">
                <h3 class="ml-2">Products to be complete</h3>
                <div class="col text-right">
                  <a href="{{route('workorder')}}?id={{DB::table('workorders')->where('id', $_GET['id'])->value('production_id');}}" class="btn btn-sm btn-neutral"><i class="fas fa-exit"></i> Back</a>
                </div>
              </div>
              </div>
              <div class="table-responsive">
                <table class="table table-flush" >
                  <thead class="thead-light">
                    <tr >
                      <th scope="col" class="sort" data-sort="name">Products</th>
                      <th scope="col" class="sort" data-sort="status">Status</th>
                      <th scope="col" class="sort" data-sort="operator">Operator</th>
                      <th scope="col" class="sort" data-sort="quantity">Quantity</th>
                      <th scope="col" class="sort" data-sort="completion">Completion</th>
                      <th scope="col" class="sort" data-sort="due_date">Due Date</th>
                      <th scope="col" >Action</th>
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
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="media-body">
                            <span class="name mb-0 text-sm  text-primary"> {{ $row->product_name}} </span>
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
                          <a href="{{route('admin.view',$row->operator_id) }}" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="{{DB::table('users')->where('id',$row->operator_id)->value('fullname')}}">
                            <img alt="Image placeholder" src="{{route('user.fetch', $row->operator_id)}}">
                          </a>
                        </div>
                        @endif
                      </td>
                      <th>
                        <span class="name mb-0 text-sm"> {{ $row->quantity}} </span>
                      </th>
                      <td class="d-flex">
                        
                        <div class="progress " style="height:15px">
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" 
                            aria-valuenow="{{$value = DB::table('products')->select(DB::raw('AVG(completion/quantity) as total'))->where('id',$row->id)->value("total")*100   }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$value}}%;">
                          </div>
                        </div>
                        <span class="completion mr-2"> {{round($value,0)}}%</span>
                      </td>
                      <td>
                        @include('pages.condition.dueCon')
                      </td>
                      <td  >
                          <a href="{{route('product.show',$row->id)}}" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i></a>
                          <a href="{{route('product.edit',$row->id)}}" class="btn btn-sm btn-neutral"><i class="fas fa-edit"></i></a>
                          <a href="#" data-toggle="modal" data-target="#ModelDelete{{$row->id}}" class="btn btn-sm btn-neutral"><i class="fas fa-trash"></i></a>
                      </td>
                      @include('pages.model.delete',['title'=>'product.destroy','delete'=>'Product'])
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
                
                <div class="mt-3 mb-3 mr-3" style="float:right;">
                  {!! $works->appends(request()->input())->links() !!}
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
 @endsection