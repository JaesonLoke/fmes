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

class AdminTable extends LivewireDatatable
{
    public $model = User::class;
	

    function columns()
    {
    	return [
			
    		NumberColumn::name('id')->label('ID')->sortBy('id'),
    		Column::name('name')->label('Username'),
    		Column::name('email')->label('Email Address')->link('mailto:{{email}}'),
    		DateColumn::name('created_at')->label('Creation Date')->,
			Column::callback('id', function ($value) {
                return "<a class='btn btn-sm ' href='viewuser/$value' role='button'><i class='fas fa-eye'></i></a>";
				
            })->label('View')
		];
    }
}

