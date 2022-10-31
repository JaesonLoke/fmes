    @if ($row['status'] == 'emergency' || date("Y-m-d") >= $row['due_date'])

    <span class="text-danger">{{$row->due_date}}</span>

    @elseif ($row['status'] == 'delayed' || $row['status'] == 'pending' || date("Y-m-d") >= Carbon\Carbon::parse($row['due_date'])->subDays(5)  )  
    
        <span class="text-warning">{{ $row->due_date }}</span>
  
    
    @elseif ($row['status'] == 'completed' || $row['status'] == 'on_schedule' || $row['status'] == 'new' || $row['status'] == 'Running')  
    
        <span class="text-success">{{$row->due_date}}</span>
      
    @else
    
    <i class='bg-success'></i>
    <span class='status'>fail</span>
                              
    @endif
    
