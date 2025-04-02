<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowUsersChat extends Component
{
    public function render()
    {

        $users = User::where('id', '!=', Auth::id())->get();
        return view('livewire.show-users-chat', compact('users'));
    }
}
