<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class IndexUser extends Component
{
    public $selectUserId = 0;
    public $search;
    protected $querySearch = ['search'];
    public $numRows = 15;
    public function render()
    {
        $collection = User::where('name', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
            ->orWhere('role', 'like', "%{$this->search}%")
            ->paginate($this->numRows);
        $collections = User::paginate($this->numRows);
        return view('livewire.user.index-user', [
            'collection' => $collection,
            'collections' => $collections
        ]);
    }
    public function changeSelectedUserId($userId)
    {
        $this->selectUserId = $userId;
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}
