<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Profesor;
use App\Models\Alumno;
use App\Models\User;
use App\Models\Padre;
use App\Models\Materia;
use App\Models\Horario;
use App\Models\Curso;
use App\Models\MateriaProfesor;
use App\Models\PadreHijo;
use App\Models\CursoProfesor;
use App\Models\CursoAlumno;



class ProcesosController extends Controller
{
    public function redirect(){
        $usertype = Auth::user()->usertype;
        if ($usertype == '1'){
            return view('admin/inicio.home');
        }
        else{
            return view('dashboard');
        }
    }

    public function inicio(){
        return view('admin/inicio.home');
    }
    /*------------------------------------------------------------------------- */
    
    /*------------------------------------------------------------------------- */
    
    public function materia_profesor(){
        $profesor = Profesor::all(); // Suponiendo que Profesor es el modelo que representa la tabla de profesores
        $materia = Materia::all();
        $profesorMateria = MateriaProfesor::all();
        return view('admin/proceso.materia_profesor', compact('profesor', 'materia','profesorMateria'));
    }

    public function crear_materia_Profesor(Request $request){
        $profesorMateria = new MateriaProfesor;
        $profesorMateria->profesor_id = $request->profesor_id;
        $profesorMateria->materia_id = $request->materia_id;
        $profesorMateria->save();
    
        return redirect()->back()->with('message', 'Agregado exitosamente');
    }
    
    
    
    /*------------------------------------------------------------------------- */
    public function padre_alumno(){
        $papa = Padre::all(); // Suponiendo que Profesor es el modelo que representa la tabla de profesores
        $estudiante = Alumno::all();
        $padreEstudiante = PadreHijo::all();
        return view('admin/proceso.padre_alumno', compact('papa', 'estudiante','padreEstudiante'));
    }

    public function crear_padre_alumno(Request $request){
        $padreEstudiante = new PadreHijo;
        $padreEstudiante->padre_id = $request->padre_id;
        $padreEstudiante->hijo_id = $request->hijo_id;
        $padreEstudiante->save();   
        return redirect()->back()->with('message', 'Agregado exitosamente');
    }
    /*------------------------------------------------------------------------- */

    public function curso_profesor(){
        $curso = Curso::all(); 
        $profesor = Profesor::all(); 
        $cursoProfesor = CursoProfesor::all(); // Suponiendo que Profesor es el modelo que representa la tabla de profesores
        return view('admin/proceso.curso_profesor', compact('curso', 'profesor','cursoProfesor'));
    }

    public function crear_curso_profesor(Request $request){
        $cursoProfesor = new CursoProfesor;
        $cursoProfesor->curso_id = $request->curso_id;
        $cursoProfesor->profesor_id = $request->profesor_id;
        $cursoProfesor->save();   
        return redirect()->back()->with('message', 'Agregado exitosamente');
    }
    /*------------------------------------------------------------------------- */
    
    public function curso_alumno(){
        $curso = Curso::all();
        $alumno = Alumno::all();  
        $profesor = Profesor::all(); 
        $cursoAlumno = CursoAlumno::all(); // Suponiendo que Profesor es el modelo que representa la tabla de profesores
        return view('admin/proceso.curso_alumno', compact('curso', 'alumno','profesor','cursoAlumno'));
    }

    public function crear_curso_alumno(Request $request){
        $cursoAlumno = new CursoAlumno;
        $cursoAlumno->curso_id = $request->curso_id;
        $cursoAlumno->alumno_id = $request->alumno_id;
        $cursoAlumno->profesor_id = $request->profesor_id;
        $cursoAlumno->save();   
        return redirect()->back()->with('message', 'Agregado exitosamente');
    }
    /*------------------------------------------------------------------------- */

    /*------------------------------------------------------------------------- */
    /*------------------------------------------------------------------------- */

}
