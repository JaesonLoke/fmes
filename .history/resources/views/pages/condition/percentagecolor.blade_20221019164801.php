    

<span class="text-danger mr-2">
    <i class="fas fa-arrow-down"></i> {{$sum / DB::table('notifications')->whereMonth('created_at', '=', carbon\Carbon::now()->subMonth())->sum('quantity') + DB::table('reports')->whereMonth('created_at', '=', carbon\Carbon::now()->subMonth())->sum('wastedquantity')}}

</span>

