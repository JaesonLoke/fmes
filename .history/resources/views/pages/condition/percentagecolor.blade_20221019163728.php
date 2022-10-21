@if (DB::table('reports')->whereMonth('created_at', '=', carbon\Carbon::now())->sum('wastedquantity'))
    

<span class="text-danger mr-2">
    <i class="fas fa-arrow-down"></i> 3.48%

</span>

@endif