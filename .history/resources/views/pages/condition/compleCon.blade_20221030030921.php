<div class="d-flex " >

@if ($row['status'] == 'delayed' || $row['status'] == 'pending' || $row['status'] == 'emergency' || date("Y-m-d") >= Carbon\Carbon::parse($row['due_date'])->subDays(3))  

      <div class="progress " style="height:15px ">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" 
          aria-valuenow="{{$value = DB::table('products')->select(DB::raw('AVG(completion/quantity) as total'))->where('id',$row->id)->value("total")*100   }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$value}}%;">
        </div>
      </div>

      <span class="completion mr-2"> {{round($value,0)}}%</span>

@elseif ( || $row['status'] == 'new' || $row['status'] == 'Running')  

      <div class="progress " style="height:15px">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" 
          aria-valuenow="{{$value = DB::table('products')->select(DB::raw('AVG(completion/quantity) as total'))->where('id',$row->id)->value("total")*100   }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$value}}%;">
        </div>
      </div>

      <span class="completion mr-2"> {{round($value,0)}}%</span>
  
                          
                          
@else
<i class='bg-success'></i>
<span class='status'>fail</span>
                          
@endif
</div>