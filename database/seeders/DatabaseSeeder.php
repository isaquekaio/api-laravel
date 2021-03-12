<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Paciente;
use App\Models\Doenca;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('sexos')->count() == 0)
        {
            $this->call(SexoSeeder::class);
        }

        if(DB::table('ufs')->count() == 0)
        {
            $this->call(UfSeeder::class);
        }

        if(DB::table('municipios')->count() == 0)
        {
            $this->call(MunicipioSeeder::class);
        }

        if(DB::table('doencas')->count() == 0)
        {
            $this->call(DoencaSeeder::class);
        }

        /*
        if(DB::table('pacientes')->count() == 0)
        {  
            $doencas = DB::table('doencas')->pluck('id');
            Paciente::factory()->count(50)->create()->each(function (Paciente $paciente) use ($doencas){
                $paciente->doencas()->attach($doencas->random(5));
            });     
        }
        

        if(DB::table('pesquisadores')->count() == 0)
        {
            Pesquisador::factory()->count(10)->create();
        }

        if(DB::table('users')->count() == 0)
        {
            User::factory()->count(2)->create();
        }
        */
    }
}
