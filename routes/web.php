<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Dashboard;
use App\Livewire\Medicine\AddMedicine;
use App\Livewire\Medicine\EditMedicine;
use App\Livewire\Medicine\IndexMedicine;
use App\Livewire\Records\AddRecords;
use App\Livewire\Records\EditRecords;
use App\Livewire\Records\IndexRecords;
use App\Livewire\User\AddUser;
use App\Livewire\User\EditUser;
use App\Livewire\User\IndexUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix("auth")->name("auth.")->group(function(){
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
    Route::get('logout',function(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("auth.login");
    })->name('logout');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/',Dashboard::class)->name('dashboard');

    Route::prefix("Medicine")->name("medicine.")->group(function() {
        Route::get('/',IndexMedicine::class)->name('index');
        Route::get('add',AddMedicine::class)->name('add');
        Route::get('edit/{medicine}',EditMedicine::class)->name('edit');
    });
    Route::prefix("Records")->name("records.")->group(function(){
        Route::get('/',IndexRecords::class)->name('index');
        Route::get('add',AddRecords::class)->name('add');
        Route::get('edit/{records}',EditRecords::class)->name('edit');
    });
    Route::prefix("User")->name("user.")->group(function(){
        Route::get('/',IndexUser::class)->name('index');
        Route::get('add',AddUser::class)->name('add');
        Route::get('edit/{user}',EditUser::class)->name('edit');
    });

});

