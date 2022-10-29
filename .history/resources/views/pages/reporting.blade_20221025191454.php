@extends('layouts.app', ['class' => 'bg-dark'])


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
            <div class="col-xl-3">
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
                            <canvas id="report-chart" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
  
          <div class=" col-xl-9">
            <div class="card">
              <div class="card-header bg-transparent">
                <div class="row m-0">
                <h3 class="mb-0">Reports</h3>
                </div>
              </div>
                
              <br>
              <livewire:report-table searchable="category" filterable= exportable />
                </div>
            </div>
          </div>
        </div>
      </div>

    
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('argon') }}/js/argon.js"></script>
    <script src="{{ asset('argon') }}/js/argon.min.js"></script>
    <script type="text/javascript">
  
  var OrdersChart = (function() {

//
// Variables
//

var $chart = $('#report-chart');
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