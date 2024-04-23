<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Padre;
use App\Models\TareaProfesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    public function getTareasToAlumno(Request $request)
    {
        $tareas = TareaProfesor::all();
        return response([$tareas], 200);
    }

    public function getAlumnosToPadre(Request $request)
    {

        $padre = Padre::find($request->id);
        $alumnos = DB::table('alumnos')
            ->join('padre_hijos', 'alumnos.id', '=', 'padre_hijos.hijo_id')
            ->join('padres', 'padres.id', '=', 'padre_hijos.padre_id')
            ->select(
                'padre_hijos.hijo_id as hijoId',
                'alumnos.id as alumID',
                'alumnos.Nombre as nombAlumno',
                'alumnos.ApellidoPaterno as apellPa'
            )
            ->where('padres.CI', $padre->CI)
            ->get();
        return response([$alumnos], 200);
    }
}
