<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TareaProfesor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Alumno;


class AlumnoController extends Controller
{
    public function alumno_inicio(){
        return view('alumno.alumno_inicio');
    }

    public function alumno_tarea() {
        $alumno = Alumno::where('CI', Auth::user()->ci)->firstOrFail();
    
        $tarea = DB::table('tarea_profesors')
            ->where('alumnoID', $alumno->id)
            ->get();
    
        return view('alumno.alumno_tarea', compact('tarea'));
    }
    
    
    
    
    
}
