<?php

namespace App\Livewire\Medicine;

use App\Models\Medicine;
use Livewire\Component;

class IndexMedicine extends Component
{
    public $search;
    protected $querySearch = ['search'];
    public function render()
    {
        $collection = Medicine::where('nama','like','%'.$this->search.'%')->get();
        return view('livewire.medicine.index-medicine',['collection'=>$collection]);
    }
    public function delete(Medicine $medicine){
        $medicine->delete();
    }

}
