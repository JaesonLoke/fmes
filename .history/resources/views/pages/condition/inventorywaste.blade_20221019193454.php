
@if ($wastepercentage < 0)
    

<span class="text-success mr-2">
    <i class="fas fa-arrow-up"></i> {{ str_replace('-', ' ', $wastepercentage) }}%

</span>

@elseif ($wastepercentage > 0)

<span class="text-danger mr-2">
    <i class="fas fa-arrow-up"></i> {{ $wastepercentage }}%

</span>

@else
<span class="text-success mr-2">
    <i class="fas fa-arrow-up"></i> {{ $wastepercentage }}%

</span>

@endif