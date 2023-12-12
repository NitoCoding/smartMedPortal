<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Medicine;
use App\Models\Records;
use App\Models\RecordsMedicines;

class RecordsMedicinesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecordsMedicines::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'recordIndex' => Records::factory(),
            'medicineId' => Medicine::factory(),
            'kuantitas' => $this->faker->numberBetween(1, 10000),
        ];
    }
}
