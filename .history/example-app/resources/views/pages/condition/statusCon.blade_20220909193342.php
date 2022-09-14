@if ($row->status == "on_schedule")  
<i class='bg-fail'></i>
<span class='status'>On Schedule</span>

@elseif ($row->status == "pending")  
<i class='bg-warning'></i>
<span class='status'>Pending</span>

@elseif ($row->status == "delay")  
<i class='bg-f'></i>
<span class='status'>Pending</span>

@elseif ($row->status == "pending")  
<i class='bg-warning'></i>
<span class='status'>Pending</span>
                          
@else
<i class='bg-success'></i>
<span class='status'>fail</span>
                          
@endif