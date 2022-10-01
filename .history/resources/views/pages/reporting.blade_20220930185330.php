@extends('layouts.app')

<body class="bg-dark">

@section('content')


<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            
            
        </div>
    </div>
</div>
    
    <div class="container-fluid mt--7">
        <div class="row">
                
            
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Total reports</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
  
          <div class=" col ">
            <div class="card">
              <div class="card-header bg-transparent">
                <span>Reports</span>
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table align-items-center text-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="sort" data-sort="name">Report case</th>
                        <th scope="col" class="sort" data-sort="status">Work Order</th>
                        <th scope="col" class="sort" data-sort="status">Product</th>
                        <th scope="col">Reported by</th>
                        <th scope="col" class="sort" data-sort="completion">Date reported</th>
                        <th scope="col">View</th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      @if (count($reports) == 0)
                      <tr>
                        <td colspan="5" class="text-center">No records found.</td>
                      </tr>
                    @else

                    @foreach($reports as $row)
                      <td class="name mb-0 text-sm">{{ $row->title}}</td>
                      <td class="name mb-0 text-sm">
                      {{ DB::table('workorders')->where('id', $row->WorkID)->value('id');}} </td>
                      </td>
                      <td class="name mb-0 text-sm">
                        @if ($row->ProductOrWork == "product")
                        {{ DB::table('products')->where('id', $row->ProductID)->value('id');}} </td>
                        @else
                        -<td>
                        @endif
                      
                      
                    @endforeach
                    @endif
                    </tbody>
                  </table>
                  <div style="float:right; margin-right:15px; margin-bottom:20px">
                    {!! $reports->appends(request()->input())->links() !!}
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>

    
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush