<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $data = [
        'name' => '',
        'email' => '',
        'role' => '',
        'password' => '',
        'confirmPassword' => '',
    ];

    public $rules = [
        'data.name' => 'required',
        'data.email' => 'required|unique:users,password',
        'data.role' => 'required',
        'data.password' => 'required',
        'data.confirmPassword' => 'required|same:password',

    ];
    public function render()
    {
        return view('livewire.auth.register');
    }

    public function register(){
        dd($this->data);
        $this->validate();
        // dd(collect($this->data)->except('username')->all());
        if (User::query()->create(collect($this->data)->except('confirmPassword')->all())->save()) {
            return redirect()->route('user.index');
        }
    }
}
