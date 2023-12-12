<?php

namespace App\Livewire\Medicine;

use App\Models\Medicine;
use Livewire\Component;

class IndexMedicine extends Component
{
    public $search;
    protected $querySearch = ['search'];
    public $numRows = 15;

    public function render()
    {
        $collection = Medicine::where('nama', 'like', "%{$this->search}%")
            ->orWhere('stok', 'like', "%{$this->search}%")
            ->paginate($this->numRows);
        $collections = Medicine::paginate($this->numRows);
        // $collection = Medicine::where('nama','like','%'.$this->search.'%')->get();
        return view('livewire.medicine.index-medicine', [
            'collection' => $collection,
            'collections' => $collections,
        ]);
    }
    public function delete(Medicine $medicine)
    {
        $medicine->delete();
    }

}
