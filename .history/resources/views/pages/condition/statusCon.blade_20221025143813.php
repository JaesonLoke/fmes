@if ($row->status == "on_schedule")  
<i class='bg-success'></i>
<span class='badges'>On Schedule</span>

@elseif ($row->status == "new")  
<i class='bg-success'></i>
<span class='badges'>New</span>

@elseif ($row->status == "Running")  
<i class='bg-info'></i>
<span class='badges'>Running</span>

@elseif ($row->status == "pending")  
<i class='bg-warning'></i>
<span class='badges'>Pending</span>

@elseif ($row->status == "delayed")  
<i class='bg-danger'></i>
<span class='badges'>Delayed</span>

@elseif ($row->status == "emergency")  
<i class='bg-warning'></i>
<span class='badges'>Emergency Stop</span>

@elseif ($row->status == "completed")  
<i class='bg-success'></i>
<span class='status'>Completed</span>
                          
@else
<i class='bg-danger'></i>
<span class='status'>No record</span>

@endif