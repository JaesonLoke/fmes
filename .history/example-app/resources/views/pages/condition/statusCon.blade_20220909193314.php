@if ($row->status == "on_schedule")  
<i class='bg-success'></i>
<span class='status'>On Schedule</span>

@elseif ($row->status == "pending")  
<i class='bg-success'></i>
<span class='status'>Pending</span>
                          
@else
<i class='bg-success'></i>
<span class='status'>fail</span>
                          
@endif