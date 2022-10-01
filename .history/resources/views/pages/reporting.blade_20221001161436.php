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
                            <canvas id="mychart" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
  
          <div class=" col-xl-8">
            <div class="card">
              <div class="card-header bg-transparent">
                <div class="row m-0">
                <h3 class="mb-0">Reports</h3>
                </div>
              </div>
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
                    <tr>
                      <td class="name mb-0 text-sm">{{ $row['title'] }}</td>
                      <td class="name mb-0 text-sm">
                      {{ DB::table('workorders')->where('id', $row->WorkID)->value('workorder_name');}} 
                      </td>
                      <td class="name mb-0 text-sm">
                        @if ($row->ProductOrWork == "product")
                        {{ DB::table('products')->where('id', $row->ProductID)->value('id');}} </td>
                        @else
                        -</td>
                        @endif
                      <td>
                        <div class="avatar-group">
                          <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="{{$row->ReporterID}}">
                            <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                          </a>
                        </div>
                       </td>
                    <td class="name mb-0 text-sm">{{ $row->created_at}}</td>
                    <td>
                      <a href="{{route('view.report',$row->id)}}" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i></a>
                    </td>
                    </tr>
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
    <script type="text/javascript">
  
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
        
        var labels =  {{ Js::from($labels) }};
        var reports =  {{ Js::from($data) }};
      
        const data = {
            labels: ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 20, 10, 30, 15, 40, 20, 60, 60]
            }]
        };
      
        const config = {
            type: 'bar',
            data: data,
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
        };
      
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
      
    </script>
@endpush