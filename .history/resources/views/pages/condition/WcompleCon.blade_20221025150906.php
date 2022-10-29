<div class="d-flex align-items-center">

@if ($row['status'] == 'delayed' || $row['status'] == 'pending' || $row['status'] == 'emergency' )  

      <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" 
         aria-valuenow="{{$value = DB::table('products')->select(DB::raw('AVG(completion/quantity) as total'))->where('workorder_id', $_GET['id'])->value("total")*100   }}"  
         aria-valuemin="0" aria-valuemax="100" style="width: {{round($value,0)}}%; ">
        </div>
      </div>

      <span class="completion mr-2"> {{round((int)$value,0)}}%</span>

@elseif ($row['status'] == 'completed' || $row['status'] == 'new' || $row['status'] == 'Running')  

      <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" 
         aria-valuenow="{{$value = DB::table('products')->select(DB::raw('AVG(completion/quantity) as total'))->where('workorder_id', $_GET['id'])->value("total")*100  }}"  
         aria-valuemin="0" aria-valuemax="100" style="width: {{round($value,0)}}%; height:10">
        </div>
      </div>

      <span class="completion mr-2"> {{round($value,0)}}%</span>    
                          
@else
<i class='bg-success'></i>
<span class='status'>fail</span>
                          
@endif

</div>