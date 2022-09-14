<div class="d-flex align-items-center">

@if ($row['completion'] = 100 )  

    <span class="completion mr-2">{{$row->completion}}</span>
    <div>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$row['completion']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$row->completion}}%;"></div>
      </div>
    </div>

@elseif ($row['status'] = 0)  

    <span class="completion mr-2">{{$row->completion}}</span>
    <div>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{$row['completion']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$row[completion]}} %;"></div>
      </div>
    </div>
  
                          
                          
@else
<i class='bg-success'></i>
<span class='status'>fail</span>
                          
@endif

</div>