<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Records;
use App\Models\User;

class RecordsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Records::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'pasienId' => User::factory(),
            'dokterId' => User::factory(),
            'tindakan' => $this->faker->text(),
            'tglBerobat' => $this->faker->dateTime(),
            'status' => $this->faker->randomElement(["active","pending","completed"]),
        ];
    }
}
