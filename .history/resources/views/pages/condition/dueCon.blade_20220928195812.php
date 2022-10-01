<div class="d-flex align-items-center">

    {{
    $today = date("Y-m-d");

    $expire = ;

    }}

    @if ($row['status'] == 'delayed' || $row['status'] == 'pending' || $row->due_date > strtotime($row->due_date. ' - 2 days') || $row->due_date == $today )  
    
        <span class="text-warning">{{$row->due_date}}</span>
  
    @elseif ( $row['status'] == 'emergency')

    <span class="text-white">{{$row->due_date}}</span>

    @elseif ($row['status'] == 'completed' || $row['status'] == 'on_schedule' || $row['status'] == 'new' || $row['status'] == 'Running')  
    
        <span class="text-success">{{$row->due_date}}</span>
      
    @else
    <i class='bg-success'></i>
    <span class='status'>fail</span>
                              
    @endif
    
    </div>