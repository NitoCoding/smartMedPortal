<?php

namespace App\Livewire\Medicine;

use App\Models\Medicine;
use Livewire\Component;

class IndexMedicine extends Component
{
    public function render()
    {
        $collection = Medicine::all();
        return view('livewire.medicine.index-medicine',['collection'=>$collection]);
    }
    public function delete(Medicine $medicine){
        $medicine->delete();
    }
}
