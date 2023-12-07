<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public User $user;



    public $rules = [
        'user.email'=>'required|unique:users,email',
        'user.password'=>'required',
        'user.username'=>'required',
        'user.role'=>'required',
    ];
    // public function mount($id)
    // {
    //     //get post
    //     $this->user = User::find($id);
    // }
    public function render()
    {
        logger($this->user);
        return view('livewire.user.edit-user');
    }
    public function update()
    {
        $this->validate();
        if($this->user->save()) {
            return redirect(route('user.index'));
        }
    }
}
