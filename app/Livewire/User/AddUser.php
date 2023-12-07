<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class AddUser extends Component
{
    public $data = [
        'username'=>'',
        'email'=>'',
        'password'=>'',
        'role'=>'',

    ];

    public $rules = [
        'data.email'=>'required|unique:users,email',
        'data.password'=>'required',
        'data.username'=>'required',
        'data.role'=>'required',
    ];
    public function render()
    {
        return view('livewire.user.add-user');
    }
    public function store(){
        $this->validate();
        if(User::query()->create($this->data)->save()){
            return redirect()->route('user.index');
        }
    }
}
