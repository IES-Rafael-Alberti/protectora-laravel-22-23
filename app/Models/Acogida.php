<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acogida extends Model
{
    use HasFactory;

    protected $fillable = [
        'mascota_id',
        'propietario_id',
        'fecha_inicio',
        'fecha_fin'
    ];


    public function mascota() { 
        return $this->belongsTo(Mascota::class); 
    } 
    public function propietario() { 
        return $this->belongsTo(Propietario::class); 
    } 
}
