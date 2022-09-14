@if ($row->status == "on_schedule")  
<i class='bg-success'></i>
<span class='status'>On Schedule</span>

@@if ()
    
@else
    
@endif ($row->status == "on_schedule")  
<i class='bg-success'></i>
<span class='status'>On Schedule</span>
                          
@else
<i class='bg-success'></i>
<span class='status'>fail</span>
                          
@endif