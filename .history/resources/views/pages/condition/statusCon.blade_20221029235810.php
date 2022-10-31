
@if (date("Y-m-d") >= $row['due_date'] && $row['due_date'] != null)  
<span class='badge badge-pill badge-danger'>Overdue</span>

@if (date("Y-m-d") >= $row['due_date'] && $row['due_date'] != null)  
<span class='badge badge-pill badge-danger'>Overdue</span>

@elseif ($row->status == "on_schedule")  
<span class='badge badge-pill badge-success'>On Schedule</span>

@elseif ($row->status == "new")  
<span class='badge badge-pill badge-success'>New</span>

@elseif ($row->status == "Running")  
<i class='bg-info'></i>
<span class='badge badge-pill badge-info'>Running</span>

@elseif ($row->status == "pending")  
<span class='badge badge-pill badge-warning'>Pending</span>

@elseif ($row->status == "emergency")  
<span class='badge badge-pill badge-warning'>Emergency Stop</span>

@elseif ($row->status == "completed")  
<span class='badge badge-pill badge-success'>Completed</span>
                          
@else
<span class='badge badge-pill badge-danger'>No record</span>

@endif