<?php

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public UserForm $form;




    public function mount(User $user)
    {
        $this->form->setUser($user);
    }
    // public $rules = [
    //     'user.email'=>'required|unique:users,email',
    //     'user.password'=>'required',
    //     'user.username'=>'required',
    //     'user.role'=>'required',
    // ];
    // public function mount($id)
    // {
    //     //get post
    //     $this->user = User::find($id);
    // }
    public function render()
    {
        // logger($this->user);
        return view('livewire.user.edit-user');
    }
    public function update()
    {
        $this->form->validate();
        try {
            $this->form->update();
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            return redirect()->route('user.index');
        }
    }
}
