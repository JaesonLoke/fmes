<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\LabelColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class AdminTable extends LivewireDatatable
{
    public $model = User::class;

    function columns()
    {
    	return [
			
    		NumberColumn::name('id')->label('ID')->sortBy('id')->link('viewuser/{{id}}'),
    		Column::name('name')->label('Username'),
    		Column::name('email')->label('Email Address'),
    		DateColumn::name('created_at')->label('Creation Date'),
			LabelColumn::callback('id', function ($value) {
				route('admin.view',$value) ;
            })
                ->label('Page')
		];
    }
}