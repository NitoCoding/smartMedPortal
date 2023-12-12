<?php

namespace App\Livewire\Records;

use App\Models\Records;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddRecords extends Component
{
    public $data = [
        'pasienId' => '',
        'dokterId' => '',
        'recordIndex' => '',
        'status' => 'active',
    ];
    public $rules = [
        'data.pasienId' => 'required',
        'data.dokterId' => 'required',
    ];
    public function render()
    {
        if (Auth::user()->role == "Dokter") {
            $this->data['dokterId'] = Auth::user()->id;
        }
        $dokter = User::where('role', 'Dokter')->get();
        $pasien = User::where('role', 'Pasien')->get();
        return view('livewire.records.add-records', ['dokters' => $dokter, 'pasiens' => $pasien]);
    }

    public function getRecordIndex()
    {
        $lastItem = Records::latest()->first();
        // dd($lastItem);
        if ($lastItem == null) {
            // dd($lastItem);
            return 1;
        } else {
            return (int) $lastItem->recordIndex + 1;
        }
    }
    public function store()
    {
        // dd('masuk');
        //     // dd($this->data['pasienId']);
        //     logger($this->validate());
        // dd($this->data);
        $this->validate();
        // dd($this->data);
        //     // $lastItem = Records::latest()->first();
        //     // dd($lastItem);
        //     // dd($lastItem);
        // $this->data['pasienId'] = (int)$this->data['pasienId'];
        // $this->data['dokterId'] = (int)$this->data['dokterId'];
        $this->data['tglBerobat'] = date("Y-m-d h:i:s");
        // $this->data['medicineId'] = '';
        // $this->data['kuantitas'] = null;
        // $this->data['tindakan'] = null;
        $this->data['recordIndex'] = $this->getRecordIndex();
        // dd($this->data);
        // logger(Records::query()->create($this->data)->save());
        if (Records::query()->create($this->data)->save()) {
            return redirect()->route('records.index');
        }
    }

}
