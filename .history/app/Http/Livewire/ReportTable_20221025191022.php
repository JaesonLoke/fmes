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
    return $model = Report::query();
}

    function columns()
    {
    	return [
			
    		NumberColumn::name('id')->label('ID')->sortBy('id'),
    		Column::name('category')->label('Report case'),
            Column::name('WorkID')->label('Work Order'),
            Column::name('ProductID')->label('Product'),
            Column::name('ReporterID')->label('Product'),
    		DateColumn::name('created_at')->label('Date reported'),
			Column::callback('id', function ($value) {
                return "<a class='btn btn-sm ' href='viewuser/$value' role='button'><i class='fas fa-eye'></i></a>";
				
            })->label('View')
		];
    }
}
