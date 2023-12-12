<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    //
    public ?User $user;

    #[Rule('required')]
    public $email = '';
    #[Rule('required')]
    public $role = '';
    #[Rule('required')]
    public $name = '';
    public $password = '';

    public function setUser(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->role = $user->role;
    }

    public function update()
    {
        if ($this->password == '') {
            return $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
                'password' => $this->user->password,
            ]);
        } else {
            return $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
                'password' => Hash::make($this->password),
            ]);

        }
    }
}
