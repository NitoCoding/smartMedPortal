<?php

namespace App\Livewire\Records;

use App\Models\Records;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IndexRecords extends Component
{

    public function render()
    {
        if(Auth::user()->role == "Dokter" or Auth::user()->role == "Admin"){
            $collection = Records::latest()->get();
        }else if(Auth::user()->role == "Pasien"){
            $collection = Records::where("PasienId", Auth::user()->id)->latest()->get();
        }else{
            $collection = Records::where("status", "delayed")->latest()->get();
        }
        $collection = Records::all();
        return view('livewire.records.index-records',['collection'=>$collection]);
    }

    public function delete($recordIndex){
        $records = Records::where('recordIndex',$recordIndex)->get();
        $records->delete();
    }
    public function changeStatus($recordsId){
        $records = Records::find($recordsId);
        $records->delete();
    }
}
