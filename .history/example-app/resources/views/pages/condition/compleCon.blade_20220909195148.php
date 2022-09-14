<div class="d-flex align-items-center">

@if ($row['completion'] >= 60 )  

    <span class="completion mr-2">{{$row->completion}}</span>
    <div>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
      </div>
    </div>

@elseif ($row['completion'] >= 0 )  

    <span class="completion mr-2">{{$row->completion}}</span>
    <div>
      <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
      </div>
    </div>
  
                          
                          
@else
<i class='bg-success'></i>
<span class='status'>fail</span>
                          
@endif

</div>