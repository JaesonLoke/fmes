<div class="d-flex align-items-center">

{{$value =  ($row['completion'] / $row['quantity']) * 100}}

@if ($row['status'] == 'delayed' || $row['status'] == 'pending' || $row['status'] == 'emergency' )  

    <span class="completion mr-2">{{$value}}</span>
    <div>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: {{$value}}%;"></div>
      </div>
    </div>

@elseif ($row['status'] == 'completed' || $row['status'] == 'on_schedule' || $row['status'] == 'new' || $row['status'] == 'Running')  

    <span class="completion mr-2">{{$value}}</span>
    <div>
      <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{$value}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$value}}%;"></div>
      </div>
    </div>
  
                          
                          
@else
<i class='bg-success'></i>
<span class='status'>fail</span>
                          
@endif

</div>