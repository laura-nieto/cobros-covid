<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'logo',
        'fondo1',
        'fondo2',
        'color1',
        'color2'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];
}
