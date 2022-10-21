    

<span class="text-danger mr-2">
    <i class="fas fa-arrow-down"></i> {{DB::table('notifications')->whereMonth('created_at', '=', carbon\Carbon::now())->sum('quantity') + DB::table('reports')->whereMonth('created_at', '=', carbon\Carbon::now())->sum('wastedquantity')}}

</span>

