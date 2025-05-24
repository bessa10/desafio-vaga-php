<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email', 'teste01@teste.com')->first()) {
            User::create([
                'name' => 'Teste 01',
                'email' => 'teste01@teste.com',
                'password' => Hash::make('123456', ['rounds' => 12])
            ]);
        }

        if(!User::where('email', 'teste02@teste.com')->first()) {
            User::create([
                'name' => 'Teste 02',
                'email' => 'teste02@teste.com',
                'password' => Hash::make('123456', ['rounds' => 12])
            ]);
        }

        if(!User::where('email', 'teste02@teste.com')->first()) {
            User::create([
                'name' => 'Teste 02',
                'email' => 'teste02@teste.com',
                'password' => Hash::make('123456', ['rounds' => 12])
            ]);
        }
    }
}
