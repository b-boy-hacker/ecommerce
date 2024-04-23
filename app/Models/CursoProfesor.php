<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profesor;
use App\Models\Curso;

class CursoProfesor extends Model
{
    use HasFactory;
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id', 'id');
    }
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id', 'id');
    }
}
