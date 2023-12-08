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
            $collection = Records::latest()->get()->groupBy(function($data) {
                return $data->recordIndex;
            });;
        }else if(Auth::user()->role == "Pasien"){
            $collection = Records::where("PasienId", Auth::user()->id)->latest()->get()->groupBy(function($data) {
                return $data->recordIndex;
            });;
        }else{
            $collection = Records::where("status", "delayed")->latest()->get()->groupBy(function($data) {
                return $data->recordIndex;
            });;
        }
        $collection = Records::all();
        return view('livewire.records.index-records',['collection'=>$collection]);
    }

    public function delete($recordIndex){
        // $records = Records::find($recordsIndex);
        $records = Records::where('recordIndex',$recordIndex)->get();
        $records->each->delete();
    }
    public function changeStatus($recordIndex){
        $data = ["status" => "confirmed"];
        $records = Records::where('recordIndex',$recordIndex)->get();
        foreach($records as $record){

            $record->update($data);
        }
    }
}
