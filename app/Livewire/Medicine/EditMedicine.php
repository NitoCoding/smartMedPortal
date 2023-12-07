<?php

namespace App\Livewire\Medicine;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Livewire\Component;

class EditMedicine extends Component
{
    public Medicine $medicine;
    // public $email;
    // public $tipe;
    // public $name;


    public $rules = [
        'medicine.nama'=>'required',
        'medicine.deskripsi'=>'required',
        'medicine.tipe'=>'required',
        'medicine.stok'=>'required|numeric|gt:0',
    ];

    public function mount(Medicine $medicine)
    {

        $this->medicine = $medicine;

    }
    public function render()
    {
        return view('livewire.medicine.edit-medicine');
    }
    public function update()
    {
        // dd($this->data);
        // dd($request);
        $this->validate();
        if($this->medicine->save()) {
            // dd($this);
            return redirect(route('medicine.index'));
        }
        // logger($this->medicine);
    }
}
