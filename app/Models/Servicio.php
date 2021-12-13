<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre','precio','sucursal_id'
    ];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class,'sucursal_id');
    }
}
