<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doenca;

class DoencaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doenca::create(['nome' => 'Anemia de Fanconi']);
        Doenca::create(['nome' => 'Anomalia de Ebstein']);
        Doenca::create(['nome' => 'Arterite de Takayasu']);	
        Doenca::create(['nome' => 'Artrite Reumatóide Juvenil']);
        Doenca::create(['nome' => 'Ataxia de Friedreich']);	
        Doenca::create(['nome' => 'Atrofia Muscular Espinal']);
        Doenca::create(['nome' => 'Atrofias Musculares']);
        Doenca::create(['nome' => 'Espinais da Infância']);	
        Doenca::create(['nome' => 'Atrofias Ópticas Hereditárias']);
        Doenca::create(['nome' => 'Carcinoma 256 de Walker']);	
        Doenca::create(['nome' => 'Complexo de Eisenmenger']);
    }
}
