    <?php
    $lastmonth == 0 ? 0 : DB::table('notifications')->whereMonth('created_at', '=', carbon\Carbon::now()->subMonth()->format('m'))->sum('quantity') + DB::table('reports')->whereMonth('created_at', '=', carbon\Carbon::now()->subMonth()->format('m'))->sum('wastedquantity')
    ?>

<span class="text-danger mr-2">
    <i class="fas fa-arrow-down"></i> {{ $sum / $lastmonth;}}

</span>

