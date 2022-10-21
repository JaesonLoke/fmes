
@if ($wastepercentage < 0)
    

<span class="text-danger mr-2">
    <i class="fas fa-arrow-down"></i> {{ str_replace('-', ' ', $percentage) }}%

</span>

@elseif ($percentage > 0)

<span class="text-success mr-2">
    <i class="fas fa-arrow-up"></i> {{ $percentage }}%

</span>

@else
<span class="text-success mr-2">
    <i class="fas fa-arrow-up"></i> {{ $percentage }}%

</span>

@endif