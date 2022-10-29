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
    		NumberColumn::name('id')->label('ID')->sortBy('id'),
    		Column::name('name')->label('Username'),
    		Column::name('email')->label('Email Address'),
    		DateColumn::name('created_at')->label('Creation Date'),
			Column::callback(['dob', 'signup_date'], function ($dob, $signupDate) {
                $age = $signupDate->diffInYears($dob);
                return $age > 18
                    ? '<span class="text-red-500">' . $age . '</span>'
                    : $age;
            })->exportCallback(function ($dob, $signupDate), {
                return $age = $signupDate->diffInYears($dob);
            })
		];
    }
}
