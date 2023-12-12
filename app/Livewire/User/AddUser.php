<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class AddUser extends Component
{
    public $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'role' => '',
    ];

    public $rules = [
        'data.email' => 'required|unique:users,email',
        'data.password' => 'required',
        'data.name' => 'required',
        'data.role' => 'required',
    ];
    public function render()
    {
        return view('livewire.user.add-user');
    }
    public function store()
    {
        $this->validate();
        // dd(collect($this->data)->except('username')->all());
        if (User::query()->create(collect($this->data)->except('username')->all())->save()) {
            return redirect()->route('user.index');
        }
    }
}
