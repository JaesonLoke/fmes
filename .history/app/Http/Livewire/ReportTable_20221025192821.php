<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Report;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Carbon\Carbon;


class ReportTable extends LivewireDatatable
{
    public function builder()
{
    return $model = Report::query()
    ->leftjoin('workorders','reports.WorkID', 'workorders.id')
    ->leftjoin('products','reports.ProductID', 'products.id');
}

    function columns()
    {
    	return [
			
    		NumberColumn::name('id')->label('ID')->sortBy('id'),
    		Column::name('category')->label('Report case'),
            Column::name('workorders.workorder_name')->label('Work Order'),
            Column::name('products.product_name')->label('Product'),
            Column::name('ReporterID')->label('Reported by'),
    		DateColumn::name('created_at')->label('Date reported')->filterable('month'),
			Column::callback('id', function ($value) {
                return "<a class='btn btn-sm ' href='viewreporting/$value' role='button'><i class='fas fa-eye'></i></a>";
				
            })->label('View')
		];
    }
}
