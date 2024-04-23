<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\TareaProfesor;
use App\Models\PadreHijo;
use App\Models\Alumno;
use App\Models\Padre;

use Illuminate\Support\Facades\DB;


class PadreController extends Controller
{
    public function padre_inicio(){
        return view('padre.padre_inicio');
    }

    public function hijo() {
        $padre = Padre::where('CI', Auth::user()->ci)->first();
        if ($padre) {
            $alumnos = DB::table('alumnos')
                ->join('padre_hijos', 'alumnos.id', '=', 'padre_hijos.hijo_id')
                ->join('padres', 'padres.id', '=', 'padre_hijos.padre_id')
                ->select('padre_hijos.hijo_id as hijoId', 'alumnos.id as alumID',
                         'alumnos.Nombre as nombAlumno', 'alumnos.ApellidoPaterno as apellPa')
                ->where('padres.CI', $padre->CI)
                ->get();
            return view('padre.hijo', compact('padre', 'alumnos'));
        }
    
        // Si el padre no está autenticado o no tiene una correspondencia en la base de datos, puedes manejar el caso aquí...
    }
   
    public function hijo_tarea($id) {
        $padre = Padre::where('CI', Auth::user()->ci)->first();
        if ($padre) {
            $alumno = Alumno::find($id);
        // Verificar si el alumno pertenece al padre autenticado
            $hijo_padre = PadreHijo::where('padre_id', $padre->id)
            ->where('hijo_id', $alumno->id)
            ->exists();
            if ($alumno && $hijo_padre) {
                $tarea = DB::table('tarea_profesors')
                    ->select('tarea_profesors.id','tarea_profesors.alumnoID as idAlumno',
                        'tarea_profesors.materia as mate',
                        'tarea_profesors.Tema as tema', 'tarea_profesors.Imagen as imagen', 
                        'tarea_profesors.FechaEntrega as fecha')
                    ->where('tarea_profesors.alumnoID', $id)
                    ->get();
    
                return view('padre.hijo_tarea', compact('alumno', 'tarea'));
            } else {
                // Manejar el caso si el alumno no pertenece al padre autenticado
            }
        }
    
        // Si el padre no está autenticado o no tiene una correspondencia en la base de datos, puedes manejar el caso aquí...
    }
    
    // public function hijo_tarea($id){
    //     $alumno = Alumno::find($id);
    //     $user_nombre = Auth::user()->name;
    //     if ($user_nombre == 'Maria Dorbigny') {
    //             $tarea = DB::table('tarea_profesors')
    //                 ->select('tarea_profesors.id','tarea_profesors.alumnoID as idAlumno',
    //                 'tarea_profesors.materia as mate',
    //                          'tarea_profesors.Tema as tema', 'tarea_profesors.Imagen as imagen', 
    //                          'tarea_profesors.FechaEntrega as fecha')
    //                 ->where('tarea_profesors.alumnoID', '=', $id)
    //                 ->get();
    //         return view('padre.hijo_tarea', compact('alumno', 'tarea'));
    //      }     
    // }

   
}
