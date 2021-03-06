<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen("database/seeders/municipios_ibge.csv", "r")) !== FALSE) {
            while (($item = fgetcsv($handle, 0, ",")) !== FALSE) {
                $uf = \App\Models\Uf::find($item[0]);
                $municipio = new \App\Models\Municipio();
                $municipio->id = $item[2];
                $municipio->nome = $item[3];
                $municipio->uf_id = $uf->id;
                $municipio->save();
            }
            fclose($handle);
        }

    }
}
