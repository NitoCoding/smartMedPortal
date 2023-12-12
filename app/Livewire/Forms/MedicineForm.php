<?php

namespace App\Livewire\Forms;

use App\Models\Medicine;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MedicineForm extends Form
{
    //
    public ?Medicine $medicine;

    #[Rule('required')]
    public $nama = '';
    #[Rule('required')]
    public $deskripsi = '';
    #[Rule('required')]
    public $tipe = '';
    #[Rule('required')]
    public $stok = '';

    public function setMedicine(Medicine $medicine)
    {
        $this->medicine = $medicine;
        $this->nama = $medicine->nama;
        $this->deskripsi = $medicine->deskripsi;
        $this->tipe = $medicine->tipe;
        $this->stok = $medicine->stok;
    }

    public function update()
    {
        return $this->medicine->update([
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'tipe' => $this->tipe,
            'stok' => $this->stok,
        ]);
    }
}
