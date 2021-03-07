<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        if(DB::table('sexos')->count() == 0)
        {
            $this->call(SexoSeeder::class);
        }

        if(DB::table('ufs')->count() == 0)
        {
            $this->call(UfSeeder::class);
        }

        if(DB::table('municipions')->count() == 0)
        {
            $this->call(MunicipioSeeder::class);
        }

        if(DB::table('doencas')->count() == 0)
        {
            $this->call(DoencaSeeder::class);
        }

    }
}
