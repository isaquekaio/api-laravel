<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'uf_id',];

    public function uf()
    {
        return $this->belongsTo(State::class, 'uf_id');
    }

}
