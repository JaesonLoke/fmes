@if ($work->status == "on_schedule")  
<span class='badge badge-pill badge-success'>On Schedule</span>

@elseif ($work->status == "new")  
<span class='badge badge-pill badge-success'>New</span>

@elseif ($work->status == "Running")  
<i class='bg-info'></i>
<span class='badge badge-pill badge-info'>Running</span>

@elseif ($work->status == "pending")  
<span class='badge badge-pill badge-warning'>Pending</span>

@elseif ($work->status == "delayed")  
<span class='badge badge-pill badge-danger'>Delayed</span>

@elseif ($work->status == "emergency")  
<span class='badge badge-pill badge-warning'>Emergency Stop</span>

@elseif ($work->status == "completed")  
<span class='badge badge-pill badge-success'>Completed</span>
                          
@else
<span class='badge badge-pill badge-danger'>No record</span>

@endif