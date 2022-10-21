@extends('layouts.app', ['background' => 'bg-dark'])

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Availability</h5>
                                    <span class="h1 font-weight-bold mb-0">{{$avaibility}}%</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                        <i class="fa fa-check"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap">of Production is running.</span>
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
                                    <span class="h1 font-weight-bold mb-0">{{$performance}}%</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="ni ni-user-run"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap">of Production is on-time.</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Quality</h5>
                                    <span class="h1 font-weight-bold mb-0">{{$quality}}%</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="ni ni-paper-diploma"></i>
                                    </div>
                                </div>
                                
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap">of Inventory is well-used.</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">OEE</h5>
                                    <span class="h1 font-weight-bold mb-0">{{$oee}}%</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-percent"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap">of Production is running.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">OEE value</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="line-chart" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Inventory Usage</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="inventory-chart" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Running Production</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('production')}}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light ">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Products</th>
                                    <th scope="col" class="sort" data-sort="name">Workorder</th>
                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                    <th scope="col" class="sort" data-sort="operator">Operator</th>
                                    <th scope="col" class="sort" data-sort="quantity">Quantity</th>
                                    <th scope="col" class="sort" data-sort="completion">Completion</th>
                                    <th scope="col" class="sort" data-sort="due_date">Due Date</th>
                                </tr>
                            </thead>
                            <tbody class="list text-center" >
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
                                        <a href="{{route('product')}}?id={{ $row->workorder_id }}" class="name mb-0 text-sm"> {{ $row->product_name}} </a>
                                      </div>
                                    </div>
                                  </th>
                                  <td>
                                    <span class="name mb-0 text-sm ">  {{ DB::table('workorders')->where('id', $row->workorder_id)->value('workorder_name');}} </span>
                                  </td>
                                  <td>
                                    <span class="badge badge-dot mr-4">
                                      
                                      @include('pages.condition.statusCon')
                                      
                                    </span>
                                  </td>
                                  <td>
                                    <div class="avatar-group">
                                      <a href="{{route('admin.view',$row->operator_id) }}" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="{{$row->operator_id}}">
                                        <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                      </a>
                                    </div>
                                  </td>
                                  <th>
                                    <span class="name mb-0 text-sm"> {{ $row->quantity}} </span>
                                  </th>
                                  <td>
                                    @include('pages.condition.compleCon')
                                  </td>
                                  <td>
                                    @include('pages.condition.dueCon')
                                  </td>
                                </tr>
                                @endforeach
                                @endif
                              </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Reports</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('reporting')}}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Report case</th>
                                    <th scope="col" class="sort" data-sort="status">Work Order</th>
                                    <th scope="col" class="sort" data-sort="status">Product</th>
                                    <th scope="col">View</th>
                                </tr>
                            </thead>
                            <tbody class="list text-center">
                                @if (count($reports) == 0)
                                <tr>
                                  <td colspan="5" class="text-center">No records found.</td>
                                </tr>
                              @else
          
                              @foreach($reports as $row)
                              <tr>
                                <td class="name mb-0 text-sm">{{ $row['category'] }}</td>
                                <td class="name mb-0 text-sm">
                                {{ DB::table('workorders')->where('id', $row->WorkID)->value('workorder_name');}} 
                                </td>
                                <td class="name mb-0 text-sm">
                                  @if ($row->ProductOrWork == "product")
                                  {{ DB::table('products')->where('id', $row->ProductID)->value('product_name');}} </td>
                                  @else
                                  -</td>
                                  @endif
                              <td>
                                <a href="{{route('view.report',$row->id)}}" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i></a>
                              </td>
                              </tr>
                              @endforeach
                              @endif
                              </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('argon') }}/js/argon.js"></script>
    <script src="{{ asset('argon') }}/js/argon.min.js"></script>
    <script type="text/javascript">
  
  var SalesChart = (function() {

// Variables

var $chart = $('#line-chart');
var orders =  {{ Js::from($linedata) }};
var linemonths =  {{ Js::from($linelabels) }};

const getLastNMonths = n => {           
      const d = new Date();
      const currentMonth = d.getMonth();
      const locale = 'en-GB';

      let result = [];
      for (let i = n; i > 0; i--) {
          d.setMonth(currentMonth - i);
          result.push(d.toLocaleDateString(locale, { month: 'long' }));
      }
      return result;
  };

// Methods

function init($chart) {

  var salesChart = new Chart($chart, {
    type: 'line',
    options: {
      scales: {
        yAxes: [{
          gridLines: {
            lineWidth: 1,
            color: Charts.colors.gray[900],
            zeroLineColor: Charts.colors.gray[900]
          },
          ticks: {
            callback: function(value) {
              if (!(value % 10)) {
                return  value 
              }
            }
          }
        }]
      },
      tooltips: {
        callbacks: {
          label: function(item, data) {
            var label = data.datasets[item.datasetIndex].label || '';
            var yLabel = item.yLabel;
            var content = '';

            if (data.datasets.length > 1) {
              content += '<span class="popover-body-label mr-auto">' + label + '</span>';
            }

            content += '<span class="popover-body-value">' + yLabel + '</span>';
            return content;
          }
        }
      }
    },
    data: {
      labels: linemonths,
      datasets: [{
        label: 'Performance',
        data: orders,
      }]
    }
  });

  // Save to jQuery object

  $chart.data('chart', salesChart);

};


// Events

if ($chart.length) {
  init($chart);
}

})();

  var OrdersChart = (function() {

//
// Variables
//

var $chart = $('#inventory-chart');
var $ordersSelect = $('[name="ordersSelect"]');
var reports =  {{ Js::from($data) }};
var months =  {{ Js::from($labels) }};

const getLastNMonths = n => {           
      const d = new Date();
      const currentMonth = d.getMonth();
      const locale = 'en-GB';

      let result = [];
      for (let i = n; i > 0; i--) {
          d.setMonth(currentMonth - i);
          result.push(d.toLocaleDateString(locale, { month: 'long' }));
      }
      return result;
  };


//
// Methods
//

// Init chart
function initChart($chart) {

  
  // Create chart
  var ordersChart = new Chart($chart, {
    type: 'bar',
    options: {
      scales: {
        yAxes: [{
          ticks: {
            callback: function(value) {
              if (!(value % 10)) {
                //return '$' + value + 'k'
                return value
              }
            }
          }
        }]
      },
      tooltips: {
        callbacks: {
          label: function(item, data) {
            var label = data.datasets[item.datasetIndex].label || '';
            var yLabel = item.yLabel;
            var content = '';

            if (data.datasets.length > 1) {
              content += '<span class="popover-body-label mr-auto">' + label + '</span>';
            }

            content += '<span class="popover-body-value">' + yLabel + '</span>';
            
            return content;
          }
        }
      }
    },
    data: {
      labels: months,
      datasets: [{
            data: reports,
      }]
    }
  });

  // Save to jQuery object
  $chart.data('chart', ordersChart);
}


// Init chart
if ($chart.length) {
  initChart($chart);
}

})();
      
    </script>
@endpush