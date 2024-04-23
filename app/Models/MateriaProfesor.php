<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materia;
use App\Models\Profesor;

class MateriaProfesor extends Model
{
    use HasFactory;
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id', 'id');
    }
    public function materia()
    {
        return $this->belongsTo(Materia::class, 'materia_id', 'id');
    }
}
