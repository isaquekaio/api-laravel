<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesquisador extends Model
{
    use HasFactory;

    protected $table = 'pesquisadores';

    protected $fillable = ['nome', 'cpf', 'data_nascimento', 'sexo_id', 'uf_id', 'municipio_id'];

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

}
