@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')

    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Inventory</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Inventory</li>
                </ol>
              </nav>
            </div>
          </div>
        
      
            
            </div>
          </div>
        </div>
      

    

    <!-- Page content -->
    <div class="container-fluid mt--5">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">

              <div class=" text-right">
                <a href="{{route('inventory.create')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> New</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Items</th>
                      <th scope="col" class="sort" data-sort="status">Pictures</th>
                      <th scope="col">Stocks</th>
                      <th scope="col" class="sort" data-sort="completion">Last updates</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @if (count($inventorys) == 0)
                      <tr>
                        <td colspan="5" class="text-center">No records found.</td>
                      </tr>
                    @else

                    @foreach($inventorys as $row)
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{$row->inventory_name}}</span>
                          </div>
                        </div>
                      </th>
                      <td>
                        <img src="{{route('inventory.fetch',$row->id)}}" class="img-thumbnail" height="100px" width="100px"/>
                      </td>
                      <td>
                        <span class="name mb-0 text-sm">{{$row->quantity}}</span>
                      </td>
                      <td>
                        <span class="name mb-0 text-sm">{{$row->updated_at}}</span>
                      </td>
                      <td class="text-right">
                          <a href="{{route('inventory.edit',$row->id)}}" class="btn btn-sm btn-neutral"><i class="fas fa-edit"></i></a>
                          <a href="#" data-toggle="modal" data-target="#ModelDelete{{$row->id}}" class="btn btn-sm btn-neutral"><i class="fas fa-trash"></i></a>
                      </td>
                      @include('pages.model.delete',['title'=>'inventory.destroy','delete'=>'Inventory'])
                    </tr>
                    
                    @endforeach
                    @endif
                  </tbody>
                </table>
                <div style="float:right; margin-right:15px; margin-bottom:20px">
                  {!! $inventorys->appends(request()->input())->links() !!}
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection