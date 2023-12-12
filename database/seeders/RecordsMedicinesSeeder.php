<?php

namespace Database\Seeders;

use App\Models\RecordsMedicines;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecordsMedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        RecordsMedicines::factory()->count(15)->create();
    }
}
