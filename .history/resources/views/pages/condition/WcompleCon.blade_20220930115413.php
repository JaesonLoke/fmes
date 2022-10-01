<div class="d-flex align-items-center">

@if ($row['status'] == 'delayed' || $row['status'] == 'pending' || $row['status'] == 'emergency' )  

      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" 
        {{-- aria-valuenow="{{ $value = ((DB::table('products')->where('id', $_GET['id'])->AVG('completion')) / (DB::table('products')->where('id', $_GET['id'])->AVG('quantity'))) ; }}"  --}}
        aria-valuemin="0" aria-valuemax="100" style="width: {{$value}}%;"></div>
      </div>

      <span class="completion mr-2"> {{round((int)$value,0)}}%</span>

@elseif ($row['status'] == 'completed' || $row['status'] == 'new' || $row['status'] == 'Running')  

      <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" 
        aria-valuenow="{{$value = (DB::table('products')->where('id', $_GET['id'])->select('completion') / (DB::table('products')->where('id', $_GET['id'])->select('quantity') }}" 
        aria-valuemin="0" aria-valuemax="100" style="width: {{$value}}%;"></div>
      </div>

      <span class="completion mr-2"> {{round((int)$value,0)}}%</span>
  
                          
                          
@else
<i class='bg-success'></i>
<span class='status'>fail</span>
                          
@endif

</div>