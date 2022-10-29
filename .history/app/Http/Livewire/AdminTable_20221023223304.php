<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ld;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

use Livewire\Component;

class AdminTable extends Component
{
    public function render()
    {
        return view('livewire.admin-table');
    }
}
