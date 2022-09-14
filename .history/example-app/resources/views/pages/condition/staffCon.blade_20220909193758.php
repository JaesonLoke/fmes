@if ($row->status == "on_schedule")  
<div class="avatar-group">

    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
      <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
    </a>
  </div>
                          
                          
@else
<i class='bg-success'></i>
<span class='status'>fail</span>
                          
@endif