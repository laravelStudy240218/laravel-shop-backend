<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;
    public $token;

    public function login()
    {
        $credentials = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return;
        }

        $user = Auth::user();

        $this->token = $user->createToken('web')->plainTextToken;

        $this->addError('email', 'Email or password is incorrect.');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
