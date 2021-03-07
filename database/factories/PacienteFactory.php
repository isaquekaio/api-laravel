<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PacienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paciente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //'nome', 'data_nascimento', 'sus'
        $uf = $this->faker->randomElement([11, 12, 13, 14, 15, 16, 17, 21, 22, 23, 24, 25, 26, 27, 28, 29, 31, 32, 33, 35, 41, 42, 43, 50, 51, 52, 53]);
        $municipio = DB::table('municipios')->select('id')->where('uf_id', $uf)->get()->random();
        
        return [
            'nome' => $this->faker->name,
            'sus' => $this->faker->cnpj(false), //para simular o número do sus
            'data_nascimento' => intval($this->faker->date($format = 'Ymd', $max = 'now')),
            'sexo_id' => $this->faker->numberBetween(1, 2),
            'uf_id' => $uf,
            'municipio_id' => $municipio,
        ];
    }
}
