@if ($product->status == "on_schedule")  
<span  style="width:200px; height:30px" class='badge badge-pill badge-success'>On Schedule</span>

@elseif ($product->status == "new")  
<span  style="width:200px; height:30px" class='badge badge-pill badge-success'>New</span>

@elseif ($product->status == "Running")  
<i  style="width:200px; height:30px" class='bg-info'></i>
<span  style="width:200px; height:30px" class='badge badge-pill badge-info'>Running</span>

@elseif ($product->status == "pending")  
<span  style="width:200px; height:30px" class='badge badge-pill badge-warning'>Pending</span>

@elseif ($product->status == "delayed")  
<span  style="width:200px; height:30px" class='badge badge-pill badge-danger'>Delayed</span>

@elseif ($product->status == "emergency")  
<span  style="width:200px; height:30px" class='badge badge-pill badge-warning'>Emergency Stop</span>

@elseif ($product->status == "completed")  
<span  style="width:200px; height:30px" class='badge badge-pill badge-success'>Completed</span>
                          
@else
<span  style="width:200px; height:30px" class='badge badge-pill badge-danger'>No record</span>

@endif