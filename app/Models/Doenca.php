<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;

class Doenca extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class, 'doencas_tem_pacientes');
    }
}
