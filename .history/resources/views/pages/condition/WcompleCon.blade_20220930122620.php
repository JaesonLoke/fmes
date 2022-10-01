<div class="d-flex align-items-center">

@if ($row['status'] == 'delayed' || $row['status'] == 'pending' || $row['status'] == 'emergency' )  

      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" 
        {{-- aria-valuenow="{{ $value = ((DB::table('products')->where('id', $_GET['id'])->AVG('completion')) / (DB::table('products')->where('id', $_GET['id'])->AVG('quantity'))) ; }}"  --}}
        aria-valuemin="0" aria-valuemax="100" {{--style="width: {{$value}}%;"--}}></div>
      </div>

      {{-- <span class="completion mr-2"> {{round((int)$value,0)}}%</span> --}}

@elseif ($row['status'] == 'completed' || $row['status'] == 'new' || $row['status'] == 'Running')  

      <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" 
        {{-- aria-valuenow="{{$value = DB::table('products')->select('completion')->where('workorder_id', $_GET['id']) / DB::table('products')->where('workorder_id', $_GET['id'])->select('quantity') }}"  --}}
        aria-valuemin="0" aria-valuemax="100" {{--style="width: {{}}%;"--}}></div>
      </div>

      <span class="completion mr-2"> {{$value = DB::table('products')->select("completion= as total")->where('workorder_id', $_GET['id'])->value("total)")  }}%</span>
  
      {{-- {{$value = DB::table('products')->where('workorder_id', $_GET['id'])->select('AVG(completion)')->get()}}%      --}}
                          
@else
<i class='bg-success'></i>
<span class='status'>fail</span>
                          
@endif

</div>