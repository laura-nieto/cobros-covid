<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cortesia extends Model
{
    use HasFactory, SoftDeletes;

    public function cita()
    {
        return $this->belongsTo(Cita::class,'cita_id');
    }
    public function cita_deleted()
    {
        return $this->belongsTo(Cita::class,'cita_id')->withTrashed();
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
