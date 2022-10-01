<div class="d-flex align-items-center">

@if ($row['status'] == 'delayed' || $row['status'] == 'pending' || $row['status'] == 'emergency' )  

      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" 
         aria-valuenow="{{$value = DB::table('products')->select(DB::raw('AVG(completion/quantity) as total'))->where('workorder_id', $_GET['id'])->value("total")  }}"  
         width: {{round($value,0)}}% style="width: {{round($value,0)}}%;"</div>
      </div>

      <span class="completion mr-2"> {{round((int)$value,0)}}%</span>

@elseif ($row['status'] == 'completed' || $row['status'] == 'new' || $row['status'] == 'Running')  

      <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" 
        aria-valuenow="{{$value = DB::table('products')->select('completion')->where('workorder_id', $_GET['id']) / DB::table('products')->where('workorder_id', $_GET['id'])->select('quantity') }}" 
        aria-valuemin="0" aria-valuemax="100" {{--style="width: {{}}%;"--}}></div>
      </div>

      <span class="completion mr-2"> %</span>
  
      {{-- {{$value = DB::table('products')->where('workorder_id', $_GET['id'])->select('AVG(completion)')->get()}}%      --}}
                          
@else
<i class='bg-success'></i>
<span class='status'>fail</span>
                          
@endif

</div>