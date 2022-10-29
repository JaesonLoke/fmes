@if ($row->status == "on_schedule")  
<i class='bg-'></i>
<span class='badge badge-pill badge-primary'>On Schedule</span>

@elseif ($row->status == "new")  
<i class='bg-success'></i>
<span class='badge badge-pill badge-primary'>New</span>

@elseif ($row->status == "Running")  
<i class='bg-info'></i>
<span class='badge badge-pill badge-primary'>Running</span>

@elseif ($row->status == "pending")  
<i class='bg-warning'></i>
<span class='badge badge-pill badge-primary'>Pending</span>

@elseif ($row->status == "delayed")  
<i class='bg-danger'></i>
<span class='badge badge-pill badge-primary'>Delayed</span>

@elseif ($row->status == "emergency")  
<i class='bg-warning'></i>
<span class='badge badge-pill badge-primary'>Emergency Stop</span>

@elseif ($row->status == "completed")  
<i class='bg-success'></i>
<span class='badge badge-pill badge-primary'>Completed</span>
                          
@else
<i class='bg-danger'></i>
<span class='badge badge-pill badge-primary'>No record</span>

@endif