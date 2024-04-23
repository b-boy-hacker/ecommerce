<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profesor;
use App\Models\Alumno;

class PadreHijo extends Model
{
    use HasFactory;
    public function padre()
    {
        return $this->belongsTo(Padre::class, 'padre_id', 'id');
    }
    public function hijo()
    {
        return $this->belongsTo(Alumno::class, 'hijo_id', 'id');
    }
}
