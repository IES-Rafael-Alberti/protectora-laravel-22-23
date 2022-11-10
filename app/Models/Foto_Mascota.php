<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto_Mascota extends Model
{
    use HasFactory;

    protected $fillable = [
        'rutafoto',
        'mascota_id'
    ];

    public function mascota() {
        return $this->belongsTo(Mascota::class);
    }
}
