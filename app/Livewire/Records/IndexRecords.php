<?php

namespace App\Livewire\Records;

use App\Models\Records;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IndexRecords extends Component
{
    public $search;
    protected $querySearch = ['search'];

    public $numRows = 15;

    public function render()
    {
        if (Auth::user()->role == "Dokter" or Auth::user()->role == "Admin") {
            $collection = Records::Where('status','like',"%{$this->search}%")->latest()->paginate($this->numRows);
            ;
        } else if (Auth::user()->role == "Pasien") {
            $collection = Records::where("PasienId", Auth::user()->id)
            ->orWhere('status','like',"%{$this->search}%")
            ->latest()->paginate($this->numRows);
            ;
        } else if (Auth::user()->role == "Apoteker") {
            $collection = Records::where("status", "Pending")
            ->orWhere('status','like',"%{$this->search}%")
            ->latest()->paginate($this->numRows);
        } else {
            abort(403, "Unauthorize action");
        }
        $collections = Records::paginate($this->numRows);
        // dd($collection);
        return view('livewire.records.index-records', [
            'collection' => $collection,
            'collections'=>$collections,
        ]);
    }

    public function delete($recordIndex)
    {
        // $records = Records::find($recordsIndex);
        $records = Records::where('recordIndex', $recordIndex)->get();
        $records->each->delete();
    }
    public function changeStatus($recordIndex)
    {
        $data = ["status" => "confirmed"];
        $records = Records::where('recordIndex', $recordIndex)->get();
        foreach ($records as $record) {

            $record->update($data);
        }
    }
}
