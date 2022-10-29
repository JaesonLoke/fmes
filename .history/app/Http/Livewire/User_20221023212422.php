<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App

class User extends Component
{
    public $users;

    public function render()
    {
        $this->users = User;
        return view('livewire.user');
    }
}
