
@if ($sdpercentage < 0)
    

<span class="text-success mr-2">
    <i class="fas fa-arrow-down"></i> {{ str_replace('-', ' ', $sdpercentage) }}%

</span>

@elseif ($sdpercentage > 0)

<span class="text-danger mr-2">
    <i class="fas fa-arrow-up"></i> {{ $sdpercentage }}%

</span>

@else
<span class="text-success mr-2">
    <i class="fas fa-arrow-up"></i> {{ $sdpercentage }}%

</span>

@endif