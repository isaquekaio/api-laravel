<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doenca;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'data_nascimento', 'sus', 'sexo_id', 'uf_id', 'municipio_id'];

    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'sexo_id');
    }

    public function uf()
    {
        return $this->belongsTo(Uf::class, 'uf_id');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }

    public function doencas()
    {
        return $this->belongsToMany(Doenca::class, 'doencas_tem_pacientes');
    }
}
