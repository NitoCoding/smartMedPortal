<?php

namespace App\Livewire\Forms;

use App\Models\Records;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RecordsForm extends Form
{
    //
    public ?Records $records;


    #[Rule('required')]
    public $recordIndex = '';

    #[Rule('required')]
    public $pasienId = '';

    #[Rule('required')]
    public $dokterId = '';

    #[Rule('required')]
    public $medicineId = [];

    #[Rule('required')]
    public $kuantitas = [];

    #[Rule('required')]
    public $tindakan = '';


    public function setRecords(Records $records)
    {
        // dd($records);
        $this->records = $records;
        $this->recordIndex = $records->recordIndex;
        $this->pasienId = $records->pasienId;
        $this->dokterId = $records->dokterId;
        $this->dokterId = $records->dokterId;
        $this->tindakan = $records->tindakan;
    }

    // public function addNumberMedicine(){
    //     $this->numberMedicines ;
    // }
    // public function removeNumberMedicine(){
    //     $this->numberMedicines++;
    // }

    public function update()
    {
        // for ($i=0; $i < $this->numberMedicines; $i++) {
        //     # code...
        // }
        // dd($this);
        foreach ($this->medicineId as $key => $value) {
            $this->records->update([
                'recordIndex' => $this->recordIndex,
                'pasienId' => $this->pasienId,
                'dokterId' => $this->dokterId,
                'MedicineId' => $this->medicineId[$key],
                'kuantitas' => $this->kuantitas[$key],
                'tindakan' => $this->tindakan
            ]);
        }


    }




}
