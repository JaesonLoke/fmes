@if ($row->status == "on_schedule")  
<span class='badge badge-pill badge-success'>On Schedule</span>

@elseif ($row->status == "new")  
<span class='badge badge-pill badge-success'>New</span>

@elseif ($row->status == "Running")  
<i class='bg-info'></i>
<span class='badge badge-pill badge-info'>Running</span>

@elseif ($row->status == "pending")  
<span class='badge badge-pill badge-warning'>Pending</span>

@elseif ($row->status == "delayed")  
<span class='badge badge-pill badge-danger'>Delayed</span>

@elseif ($row->status == "emergency")  
<span class='badge badge-pill badge-warning'>Emergency Stop</span>

@elseif ($row->status == "completed")  
<i class='bg-success'></i>
<span class='badge badge-pill badge-success'>Completed</span>
                          
@else
<i class='bg-danger'></i>
<span class='badge badge-pill badge-primary'>No record</span>

@endif