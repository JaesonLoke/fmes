@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')

    <!-- Header -->
    <div class="header bg-primary pb-6 pt-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 ">
              <h6 class="h2 text-white d-inline-block mb-0">Inventory</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-primary"><a href="{{Route('home')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Inventory</li>
                </ol>
              </nav>
            </div>
          </div>
        
      
            <div class="row ">
              <div class="col-xl-3 col-lg-6 ">
                  <div class="card card-stats mb-4 mb-xl-0">
                      <div class="card-body">
                          <div class="row">
                              <div class="col">
                                  <h5 class="card-title text-uppercase text-muted mb-0">Usage of Items</h5>
                                  <span class="h2 font-weight-bold mb-0">{{ $sum }}</span>
                              </div>
                              <div class="col-auto">
                                  <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                      <i class="fas fa-box-open"></i>
                                  </div>
                              </div>
                          </div>
                          <p class="mt-3 mb-0 text-muted text-sm">
                              @include('pages.condition.inventoryusage')
                              <span class="text-nowrap">Since last month</span>
                          </p>
                      </div>
                  </div>
              </div>

              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Waste</h5>
                                <span class="h2 font-weight-bold mb-0">{{$wastesum}}%</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-trash"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                          @include('pages.condition.inventorywaste')
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
              </div>
              
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                          <div class="row">
                              <div class="col">
                                  <h5 class="card-title text-uppercase text-muted mb-0">Shortage and Delay</h5>
                                  <span class="h2 font-weight-bold mb-0">{{$sdthismonth}}</span><span class="text-nowrap h5"> cases</span>
                              </div>
                              <div class="col-auto">
                                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                      <i class="fas fa-truck"></i>
                                  </div>
                              </div>
                          </div>
                          <p class="mt-3 mb-0 text-muted text-sm">
                            @include('pages.condition.inventorysd')
                              <span class="text-nowrap">Since last month</span>
                          </p>
                      </div>
                  </div>
                </div>

              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row mb-0">
                            <div class="col">
                                <h4 class="card-title text-uppercase text-muted mb-0">Performance</h4>
                                <span class="h1 font-weight-bold mb-5">{{$performance}}%</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fas fa-percentage"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-1 mb-0 text-muted text-sm">
                          <span class="text-nowrap">Running Succesfully Production</span>
                      </p>
                    </div>
                </div>
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
              <div class="table-responsive p-3">
                <table class="table align-items-center table-flush data-table">
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
            </div>
          </div>
        </div>
      </div>
  </div>
  @endsection

  @push('script')
<script>

    $(function () {
        $('.data-table').DataTable({
          "aaSorting": []

        });
    });
</script>
@endpush

