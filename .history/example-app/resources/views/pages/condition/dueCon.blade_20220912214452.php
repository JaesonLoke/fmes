<div class="d-flex align-items-center">

    @if ($row['status'] == 'delayed' || $row['status'] == 'pending' )  
    
        <span class="completion mr-2">{{$row->completion}}</span>
    
    @elseif ($row['status'] == 'completed' || $row['status'] == 'on_schedule')  
    
        <span class="completion mr-2">{{$row->completion}}</span>

      
    @else
    <i class='bg-success'></i>
    <span class='status'>fail</span>
                              
    @endif
    
    </div>