<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
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
    return $model = User::query()->where('role','0');
}

    function columns()
    {
    	return [
			
    		NumberColumn::name('id')->label('ID')->sortBy('id')
		];
    }
}
