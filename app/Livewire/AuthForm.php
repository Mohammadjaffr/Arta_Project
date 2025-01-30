<?php

namespace App\Livewire;

use Livewire\Component;

class AuthForm extends Component
{
    public $showLogin;
    public $type="password";
    public $icon="eye";
    public $typeConfirmePassword="password";
    public $iconConfirmePassword="eye";

    public function mount()
    {
        $this->showLogin = request()->is('login');
    }
    public function togglePassword()
    {
        $this->type = $this->type === "password" ? "text" : "password";
        $this->icon = $this->type === "text" ? "eye-off" : "eye";
    }

    public function toggleConfirmePassword()
    {
        $this->typeConfirmePassword= $this->typeConfirmePassword==="password" ? "text" : "password";
        $this->iconConfirmePassword = $this->typeConfirmePassword === "text" ? "eye-off" : "eye";
    }

    public function toggleFormLogin()
    {
        $this->showLogin = true;
    }

    public function toggleFormRegister()
    {
        $this->showLogin = false;
    }
   
    public function render()
    {
        return view('livewire.auth-form');
    }
}
