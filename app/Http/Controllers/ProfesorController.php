<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Curso;
use App\Models\CursoProfesor;
use App\Models\CursoAlumno;
use App\Models\Profesor;
use App\Models\Alumno;
use App\Models\TareaProfesor;
use App\Models\MateriaProfesor;
use App\Models\Materia;

use Illuminate\Support\Facades\DB;



class ProfesorController extends Controller
{
    public function profesor_inicio(){
        return view('profesor.profesor_inicio');
    }

    public function lista_aulas(){
        $ciProfe = Auth::user()->ci;
        $profesor_ci = Profesor::where('CI', $ciProfe)->first();
    
        if($profesor_ci && $ciProfe == $profesor_ci->CI){
            $aulas = DB::table('cursos')
                ->join('curso_profesors', 'cursos.id', '=', 'curso_profesors.curso_id')
                ->join('profesors', 'profesors.id', '=', 'curso_profesors.profesor_id')
                ->select('cursos.id','cursos.Grado as Grado')
                ->where('profesors.CI', $profesor_ci->CI)
                ->get();            
            return view('profesor/procesos.aula', compact('profesor_ci', 'aulas'));
        }
    }     

    public function ver_alumnos(Request $request, $id) {
        $curso = Curso::find($id);
        $profesor = Profesor::where('CI', Auth::user()->ci)->first();
    
        if ($profesor) {
            $alumnos = DB::table('alumnos')
                ->join('curso_alumnos', 'alumnos.id', '=', 'curso_alumnos.alumno_id')
                ->join('cursos', 'cursos.id', '=', 'curso_alumnos.curso_id')
                ->join('profesors', 'profesors.id', '=', 'curso_alumnos.profesor_id')
                ->select('alumnos.id','alumnos.Nombre as nombre_alumno',
                         'alumnos.ApellidoPaterno as apellido_alumno1',
                         'alumnos.ApellidoMaterno as apellido_alumno2')
                ->where('cursos.id', '=', $id)
                ->where('profesors.CI', '=', $profesor->CI)
                ->get();
    
            return view('profesor.procesos.ver_alumnos', compact('curso', 'alumnos'));
        }
    
        // Si el profesor no está autenticado o no tiene una correspondencia en la base de datos, puedes manejar el caso aquí...
    }
    
    public function vista_tarea($id) {
        $alumno = Alumno::find($id);
        $profesor = Profesor::where('CI', Auth::user()->ci)->first();
    
        if ($profesor) {
            $materiaProf = DB::table('materia_profesors')
                ->join('materias', 'materias.id', '=', 'materia_profesors.materia_id')
                ->join('profesors', 'profesors.id', '=', 'materia_profesors.profesor_id')
                ->select('materia_profesors.materia_id as materiaId', 
                         'materias.Nombre as nombre_materia')
                ->where('profesors.CI', '=', $profesor->CI)
                ->get();
    
            $imagen = TareaProfesor::all();  // No estoy seguro si esto debe estar aquí o si debe filtrarse también
    
            return view('profesor.procesos.vista_tarea', compact('materiaProf', 'alumno', 'imagen'));
        }
        // Si el profesor no está autenticado o no tiene una correspondencia en la base de datos, puedes manejar el caso aquí...
    }
    
   


    public function crear_tarea(Request $request, $id) {     
        $tarea = new TareaProfesor;
        $tarea->materia = $request->materia;
        $tarea->alumnoID = $request->alumnoID;
        $tarea->Tema = $request->Tema;
        $tarea->FechaEntrega = $request->FechaEntrega;

        $imagen=$request->Imagen;
        $imagename=time().'.'.$imagen->getClientOriginalExtension();
        $request->Imagen->move('tarea', $imagename);
        $tarea->Imagen = $imagename;

        $tarea->save();
        return redirect()->back()->with('message', 'Agregado exitosamente');
    }

 
}
