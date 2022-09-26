<div class="d-flex align-items-center">

    @if ($row['status'] == 'delayed' || $row['status'] == 'pending' )  
    
        <span class="text-warning">{{$row->due_date}}</span>
    
    @elseif ($row['status'] == 'completed' @if ($row->status == "on_schedule")  
    <i class='bg-success'></i>
    <span class='status'>On Schedule</span>)  
    
        <span class="text-success">{{$row->due_date}}</span>
      
    @else
    <i class='bg-success'></i>
    <span class='status'>fail</span>
                              
    @endif
    
    </div>