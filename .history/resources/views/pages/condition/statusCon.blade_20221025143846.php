@if ($row->status == "on_schedule")  
<i class='bg-success'></i>
<span class='badge'>On Schedule</span>

@elseif ($row->status == "new")  
<i class='bg-success'></i>
<span class='badge'>New</span>

@elseif ($row->status == "Running")  
<i class='bg-info'></i>
<span class='badge'>Running</span>

@elseif ($row->status == "pending")  
<i class='bg-warning'></i>
<span class='badge'>Pending</span>

@elseif ($row->status == "delayed")  
<i class='bg-danger'></i>
<span class='badge'>Delayed</span>

@elseif ($row->status == "emergency")  
<i class='bg-warning'></i>
<span class='badge'>Emergency Stop</span>

@elseif ($row->status == "completed")  
<i class='bg-success'></i>
<span class='badge'>Completed</span>
                          
@else
<i class='bg-danger'></i>
<span class='badge'>No record</span>

@endif