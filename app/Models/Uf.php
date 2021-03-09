<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'sigla'];
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function municipios()
    {
        return $this->hasMany(Municipio::class);
    }

    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }

    public function pesquisadores()
    {
        return $this->hasMany(Pesquisador::class);
    }
}
