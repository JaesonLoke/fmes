@if ($row->status == "on_schedule")  
<i class='bg-success'></i>
<span class='status'>On Schedule</span>

@elseif ($row->status == "new")  
<i class='bg-success'></i>
<span class='status'>New</span>

@elseif ($row->status == "Running")  
<i class='bg-warning'></i>
<span class='status'>Running</span>

@elseif ($row->status == "pending")  
<i class='bg-warning'></i>
<span class='status'>Pending</span>

@elseif ($row->status == "delayed")  
<i class='bg-danger'></i>
<span class='status'>Delayed</span>

@elseif ($row->status == "completed")  
<i class='bg-success'></i>
<span class='status'>Completed</span>
                          
@else
<i class='bg-danger'></i>
<span class='status'>No record</span>
                          
@endif