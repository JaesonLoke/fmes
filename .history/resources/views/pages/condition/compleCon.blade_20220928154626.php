<div class="d-flex align-items-center">

{{$value = $row['completion']}}

@if ($row['status'] == 'delayed' || $row['status'] == 'pending' || $row['status'] == 'emergency' )  

    <span class="completion mr-2">{{$row->completion}}</span>
    <div>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$row['completion']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$row->completion}}%;"></div>
      </div>
    </div>

@elseif ($row['status'] == 'completed' || $row['status'] == 'on_schedule' || $row['status'] == 'new' || $row['status'] == 'Running')  

    <span class="completion mr-2">{{$row->completion}}</span>
    <div>
      <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{$row['completion']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$row->completion}}%;"></div>
      </div>
    </div>
  
                          
                          
@else
<i class='bg-success'></i>
<span class='status'>fail</span>
                          
@endif

</div>