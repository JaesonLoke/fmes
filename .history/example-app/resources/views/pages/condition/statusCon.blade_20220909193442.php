@if ($row->status == "on_schedule")  
<i class='bg-danger'></i>
<span class='status'>On Schedule</span>

@elseif ($row->status == "pending")  
<i class='bg-warning'></i>
<span class='status'>Pending</span>

@elseif ($row->status == "delay")  
<i class='bg-danger'></i>
<span class='status'>Delay</span>

@elseif ($row->status == "pending")  
<i class='bg-warning'></i>
<span class='status'>Completed</span>
                          
@else
<i class='bg-danger'></i>
<span class='status'>No reco</span>
                          
@endif