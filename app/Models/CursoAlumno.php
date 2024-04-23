<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profesor;
use App\Models\Alumno;
use App\Models\Curso;

class CursoAlumno extends Model
{
    use HasFactory;
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id', 'id');
    }
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id', 'id');
    }
    
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id', 'id');
    }
}
