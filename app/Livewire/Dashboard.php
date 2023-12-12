<?php

namespace App\Livewire;

use App\Models\Records;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render(Request $request)
    {
        if (Auth::user()->role == "Admin") {
            $collection = User::where('role', 'Dokter')->latest()->take(5)->get();
        } else if (Auth::user()->role == "Dokter") {
            $collection = Records::latest()->take(5)->get();
        } else if (Auth::user()->role == "Pasien") {
            $collection = Records::where("PasienId", Auth::user()->id)->latest()->take(5)->get();
        } else {
            $collection = Records::where("status", "delayed")->latest()->take(5)->get();
        }
        // dd($collection);
        return view('livewire.dashboard', ['collection' => $collection]);
    }
}
