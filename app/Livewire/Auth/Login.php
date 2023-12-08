<?php

namespace App\Livewire\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $data = [
        'email'=>'',
        'password'=>'',
        'rememberme'=>false
    ];

    public $rules = [
        'data.email'=>'required',
        'data.password'=>'required',
        'data.rememberme'=>'required',
    ];
    public function render()
    {

        return view('livewire.auth.login');
    }
    public function login(){
        // dd(collect($this->data)->except('rememberme')->all());
        $this->validate();
        // dd(Auth::attempt(collect($this->data)->except('rememberme')->all()));
        if (Auth::attempt(collect($this->data)->except('rememberme')->all())) {
        //     // dd(Auth::user());
            return redirect()->route('dashboard');
        }


    }
}
