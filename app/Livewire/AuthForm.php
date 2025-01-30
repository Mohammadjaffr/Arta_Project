<?php

namespace App\Livewire;

use Livewire\Component;

class AuthForm extends Component
{
    public $showLogin;
    public $showPassword = false;
    public $showConfirmePassword = false;

    public function mount()
    {
        $this->showLogin = request()->is('login');
    }
    public function togglePassword()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function toggleConfirmePassword()
    {
        $this->showConfirmePassword=!$this->showConfirmePassword;
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
