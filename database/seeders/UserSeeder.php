<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'natanaeltambun08@gmail.com',
            'password' => Hash::make('12345'),
        ]);
        DB::table('users')->insert([
            'email' => 'amelia12@gmail.com',
            'password' => Hash::make('12345'),
        ]);
        DB::table('users')->insert([
            'email' => 'raynaldosilalahi22@gmail.com',
            'password' => Hash::make('12345'),
        ]);
        DB::table('users')->insert([
            'email' => 'pabertoni@gmail.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
