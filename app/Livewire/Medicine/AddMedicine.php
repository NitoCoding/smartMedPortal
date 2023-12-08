<?php

namespace App\Livewire\Medicine;

use App\Models\Medicine;
use Livewire\Component;

class AddMedicine extends Component
{

    public $data = [
        'nama'=>'',
        'deskripsi'=>'',
        'tipe'=>'',
        'stok'=>''
    ];

    public $rules = [
        'data.nama'=>'required',
        'data.deskripsi'=>'required',
        'data.tipe'=>'required',
        'data.stok'=>'required|numeric|gt:0',
    ];
    public function render()
    {
        return view('livewire.medicine.add-medicine');
    }

    public function store(){
        $this->validate();
        dd($this->data);
        if(Medicine::query()->create($this->data)->save()){
            return redirect()->route('medicine.index');
        }
    }
}
