<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre',
        'fecha_nacimiento'
    ];

    public function fotos() {
        return $this->hasMany(Foto_Mascota::class);
    }

    public function acogidas() {
        return $this->hasMany(Acogida::class);
    }
}
