<div class="avatar-group">

@if ($row->status == "on_schedule")  

    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
      <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
    </a>
  
                          
                          
@else
<i class='bg-success'></i>
<span class='status'>fail</span>
                          
@endif