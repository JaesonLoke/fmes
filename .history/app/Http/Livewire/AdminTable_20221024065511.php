<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class AdminTable extends LivewireDatatable
{
    public $model = User::class;

    function columns()
    {
    	return [
			
    		NumberColumn::name('id')->label('ID')->sortBy('id')->link("viewuser/{{id}}"),
    		Column::name('name')->label('Username'),
    		Column::name('email')->label('Email Address'),
    		DateColumn::name('created_at')->label('Creation Date'),
			Column::callback(['id'], function ($id) {
                return $id 
                    ? "<a class='btn btn-sm btn-icon-only href='" . route('admin.view',$id) . "' role='button' ><i class='fas fa-eye'></i></a>"
                    : $id;
            })
		];
    }
}
