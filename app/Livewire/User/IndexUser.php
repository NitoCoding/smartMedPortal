<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class IndexUser extends Component
{
    public $selectUserId = 0;
    public function render()
    {
        $collection = User::all();
        return view('livewire.user.index-user',['collection'=>$collection]);
    }
    public function changeSelectedUserId($userId){
        $this->selectUserId = $userId;
    }

    public function delete(User $user){
        $user->delete();
    }
}
