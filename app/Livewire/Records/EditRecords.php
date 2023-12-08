<?php

namespace App\Livewire\Records;

use App\Livewire\Forms\RecordsForm;
use App\Models\Medicine;
use App\Models\Records;
use App\Models\User;
use Livewire\Component;

class EditRecords extends Component
{
    public RecordsForm $form;

    public $updateMode = false;
    public $i = 1;
    public $inputs = [];

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function mount(Records $records){
        $this->form->setRecords($records);
    }

    public function render()
    {
        $dokter = User::where('role','Dokter')->get();
        $pasien = User::where('role','Pasien')->get();
        $medicine = Medicine::query()->where('stok','>','0')->get();
        return view('livewire.records.edit-records',['dokters'=>$dokter,'pasiens'=>$pasien,'medicines'=>$medicine]);
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
        // dd($this->form);
        $this->form->validate();
        try {
            $this->form->update();
            $this->inputs = [];
            return redirect()->route('records.index');
        } catch (\Throwable $th) {
            return redirect()->route('records.index');
        }
    }


}
