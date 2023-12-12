<?php

namespace App\Livewire\Medicine;

use App\Livewire\Forms\MedicineForm;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditMedicine extends Component
{
    public MedicineForm $form;
    // public $email;
    // public $tipe;
    // public $name;

    public function mount(Medicine $medicine)
    {

        $this->form->setMedicine($medicine);
    }
    public function render()
    {
        return view('livewire.medicine.edit-medicine');
    }
    public function update()
    {
        // dd($this->data);
        // dd($request);
        // $this->validate();
        // if($this->medicine->save()) {
        //     // dd($this);
        //     return redirect(route('medicine.index'));
        // }
        // logger($this->medicine);
        $this->form->validate();
        try {
            $this->form->update();
            return redirect()->route('medicine.index');
        } catch (\Throwable $th) {
            return redirect()->route('medicine.index');
        }
    }
}
