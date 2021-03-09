<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'uf_id',];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function uf()
    {
        return $this->belongsTo(State::class, 'uf_id');
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
