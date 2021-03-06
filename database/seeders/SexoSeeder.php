<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("sexos")->insert([
            [
                "id"         => 1,
                "nome"       => "M",
            ], [
                "id"         => 2,
                "nome"       => "F",
            ],
        ]);
    }
}
