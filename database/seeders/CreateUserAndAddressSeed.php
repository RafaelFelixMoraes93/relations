<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;

class CreateUserAndAddressSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("users")->insert([
            "name" => "João Silva",
            "email" => "joao.silva@example.com",
            "password" => Hash::make("senhaSegura123"),
        ]);

        DB::table("addresses")->insert([
            "address" => "Rua Dos Bobos, N° 0"
        ]);
    }
}
