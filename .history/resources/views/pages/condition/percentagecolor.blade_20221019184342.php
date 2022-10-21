    <?php
    $lastmonth = DB::table('notifications')->whereMonth('created_at', '=', carbon\Carbon::now()->subMonth()->format('m'))->sum('quantity') + DB::table('reports')->whereMonth('created_at', '=', carbon\Carbon::now()->subMonth()->format('m'))->sum('wastedquantity');
    
    if ($lastmonth = 0) {
        $lastmonth = 10;
    }
    
    
    ?>

<span class="text-danger mr-2">
    <i class="fas fa-arrow-down"></i> {{ ($sum - $lastmonth)/ 1}}

</span>

