<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('users')->insert([
        //     'name' => 'adming',
        //     'email' => 'adming@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('adming'),
        //     'role' => 'admin',
        //     'remember_token' => str::random(10),
        // ]);

        for ($i=0; $i < 6; $i++) {
            # code...
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role'=> 'Apoteker',
                'remember_token' => Str::random(10),
            ]);
        }
        for ($i=0; $i < 6; $i++) {
            # code...
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role'=> 'Dokter',
                'remember_token' => Str::random(10),
            ]);
        }
        for ($i=0; $i < 6; $i++) {
            # code...
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role'=> 'Pasien',
                'remember_token' => Str::random(10),
            ]);
        }
        User::create([
            'name' => fake()->name(),
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role'=> 'Admin',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => fake()->name(),
            'email' => 'pasien@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role'=> 'Pasien',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => fake()->name(),
            'email' => 'apoteker@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role'=> 'Apoteker',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => fake()->name(),
            'email' => 'dokter@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role'=> 'Dokter',
            'remember_token' => Str::random(10),
        ]);
    }
}
