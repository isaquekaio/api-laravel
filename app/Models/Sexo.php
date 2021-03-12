<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }

    public function pesquisadores()
    {
        return $this->hasMany(Pesquisador::class);
    }
}
