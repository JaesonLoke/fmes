    <?php
    $lastmonth = DB::table('notifications')->whereMonth('created_at', '=', carbon\Carbon::now()->subMonth()->format('m'))->sum('quantity') + DB::table('reports')->whereMonth('created_at', '=', carbon\Carbon::now()->subMonth()->format('m'))->sum('wastedquantity');
    
    $percentage = $lastmonth == 0 ? 0 : ($sum - $lastmonth)/ $lastmonth;

    $percentage = round($percentage*100,2);
    ?>

@if ($percentage < 0)
    

<span class="text-danger mr-2">
    <i class="fas fa-arrow-down"></i> {{ $percentage }}

</span>

@elseif ()


@endif