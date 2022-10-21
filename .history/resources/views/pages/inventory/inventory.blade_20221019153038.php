@extends('layouts.pages', ['background' => 'bg-dark'])

<script>
  function nFormatter(num, digits) {
  const lookup = [
    { value: 1, symbol: "" },
    { value: 1e3, symbol: "k" },
    { value: 1e6, symbol: "M" },
    { value: 1e9, symbol: "G" },
    { value: 1e12, symbol: "T" },
    { value: 1e15, symbol: "P" },
    { value: 1e18, symbol: "E" }
  ];
  const rx = /\.0+$|(\.[0-9]*[1-9])0+$/;
  var item = lookup.slice().reverse().find(function(item) {
    return num >= item.value;
  });
  return item ? (num / item.value).toFixed(digits).replace(rx, "$1") + item.symbol : "0";
}

/*
 * Tests
 */
const tests = [
  { num: 0, digits: 1 },
  { num: 12, digits: 1 },
  { num: 1234, digits: 1 },
  { num: 100000000, digits: 1 },
  { num: 299792458, digits: 1 },
  { num: 759878, digits: 1 },
  { num: 759878, digits: 0 },
  { num: 123, digits: 1 },
  { num: 123.456, digits: 1 },
  { num: 123.456, digits: 2 },
  { num: 123.456, digits: 4 }
];
tests.forEach(function(test) {
  console.log("nFormatter(" + test.num + ", " + test.digits + ") = " + nFormatter(test.num, test.digits));
});

  </script>
  
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
        
      
            <div class="row ">
              <div class="col-xl-3 col-lg-6">
                  <div class="card card-stats mb-4 mb-xl-0">
                      <div class="card-body">
                          <div class="row">
                              <div class="col">
                                  <h5 class="card-title text-uppercase text-muted mb-0">Usage of Items</h5>
                                  <span class="h2 font-weight-bold mb-0">{{ nFormatter(DB::table('notifications')->sum('quantity') + DB::table('reports')->sum('wastedquantity'),1)  }}</span>
                              </div>
                              <div class="col-auto">
                                  <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                      <i class="fas fa-box-open"></i>
                                  </div>
                              </div>
                          </div>
                          <p class="mt-3 mb-0 text-muted text-sm">
                              <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                              <span class="text-nowrap">Since last week</span>
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
                                <span class="h2 font-weight-bold mb-0">30.62%</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-trash"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fas fa-arrow-down"></i> 12%</span>
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
                                  <span class="h2 font-weight-bold mb-0">49,65%</span>
                              </div>
                              <div class="col-auto">
                                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                      <i class="fas fa-truck"></i>
                                  </div>
                              </div>
                          </div>
                          <p class="mt-3 mb-0 text-muted text-sm">
                              <span class="text-danger mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
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
                                <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                <span class="h2 font-weight-bold mb-0">30.62%</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fas fa-percentage"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 12%</span>
                            <span class="text-nowrap">Since last month</span>
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
