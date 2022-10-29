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
use diffin

class AdminTable extends LivewireDatatable
{

	public function builder()
{
    return $model = User::query()->where('role','0');
}

    function columns()
    {
    	return [
			
    		NumberColumn::name('id')->label('ID')->sortBy('id'),
    		Column::name('name')->label('Username'),
    		Column::name('email')->label('Email Address')->link('mailto:{{email}}'),
    		DateColumn::name('created_at')->label('Creation Date')->diffInYears('2020-10-28'),
			Column::callback('id', function ($value) {
                return "<a class='btn btn-sm ' href='viewuser/$value' role='button'><i class='fas fa-eye'></i></a>";
				
            })->label('View')
		];
    }
}

