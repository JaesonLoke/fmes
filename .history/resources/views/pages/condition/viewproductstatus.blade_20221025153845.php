@if ($work->status == "on_schedule")  
<span  style="width:200px; height:30px" class='badge badge-pill badge-success'>On Schedule</span>

@elseif ($work->status == "new")  
<span  style="width:200px; height:30px" class='badge badge-pill badge-success'>New</span>

@elseif ($work->status == "Running")  
<i  style="width:200px; height:30px" class='bg-info'></i>
<span  style="width:200px; height:30px" class='badge badge-pill badge-info'>Running</span>

@elseif ($work->status == "pending")  
<span  style="width:200px; height:30px" class='badge badge-pill badge-warning'>Pending</span>

@elseif ($work->status == "delayed")  
<span  style="width:200px; height:30px" class='badge badge-pill badge-danger'>Delayed</span>

@elseif ($work->status == "emergency")  
<span  style="width:200px; height:30px" class='badge badge-pill badge-warning'>Emergency Stop</span>

@elseif ($work->status == "completed")  
<span  style="width:200px; height:30px" class='badge badge-pill badge-success'>Completed</span>
                          
@else
<span  style="width:200px; height:30px" class='badge badge-pill badge-danger'>No record</span>

@endif