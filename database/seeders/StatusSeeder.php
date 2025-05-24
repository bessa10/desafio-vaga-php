<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if(!Status::where('name', 'pendente')->first()) {
            Status::create([
                'name' => 'pendente',
            ]);
        }

        if(!Status::where('name', 'em andamento')->first()) {
            Status::create([
                'name' => 'em andamento',
            ]);
        }

        if(!Status::where('name', 'concluída')->first()) {
            Status::create([
                'name' => 'concluída',
            ]);
        }

    }
}
