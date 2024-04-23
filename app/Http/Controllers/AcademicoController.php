<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Materia;
use App\Models\Horario;
use App\Models\Curso;
use App\Models\Calendario;


class AcademicoController extends Controller
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

//---------------------------------------------------------------------------------
    public function mostrar_materia(){
        $materia = Materia::all(); // Suponiendo que Profesor es el modelo que representa la tabla de profesores
        return view('admin/materia.mostrar_materia', ['materia' => $materia]);
    }
    public function ruta_materia(){
        return view('admin/materia.crear_materia');
    }
    public function crear_materia(Request $request){
        $materia=new Materia;
        $materia->Nombre = $request->Nombre;
        $materia->save();
     return redirect()->back()->with('message','agregado exitosanmente');
    }

    public function actualizar_materia($id){
        $materia = Materia::find($id);
        return view('admin/materia.actualizar_materia', compact('materia'));
    }

    public function confirmar_materia (Request $request, $id){
        $materia = Materia::find($id);   
        $materia->Nombre = $request->Nombre;      
        $materia->save();      
        return redirect()->back()->with('message','actualizado exitosanmente');
    }
    public function borrar_materia($id){
        $borrar = Materia::find($id);
        $borrar->delete();
        return redirect()->back()->with('message','eliminado exitosanmente');
    }
//---------------------------------------------------------------------------------
public function mostrar_horario(){
    $horario = Horario::all(); // Suponiendo que Profesor es el modelo que representa la tabla de profesores
    return view('admin/horario.mostrar_horario', ['horario' => $horario]);
}
public function ruta_horario(){
    return view('admin/horario.crear_horario');
}
public function crear_horario(Request $request){
    $horario=new Horario;
    $horario->Hora = $request->Hora;
    $horario->save();
 return redirect()->back()->with('message','agregado exitosanmente');
}

public function actualizar_horario($id){
    $horario = Horario::find($id);
    return view('admin/horario.actualizar_horario', compact('horario'));
}

public function confirmar_horario (Request $request, $id){
    $horario = Horario::find($id);   
    $horario->Hora = $request->Hora;      
    $horario->save();      
    return redirect()->back()->with('message','actualizado exitosanmente');
}
public function borrar_horario($id){
    $horario = Horario::find($id);
    $horario->delete();
    return redirect()->back()->with('message','eliminado exitosanmente');
}
//---------------------------------------------------------------------------------
public function mostrar_curso(){
    $curso = Curso::all(); // Suponiendo que Profesor es el modelo que representa la tabla de profesores
    return view('admin/curso.mostrar_curso', ['curso' => $curso]);
}
public function ruta_curso(){
    return view('admin/curso.crear_curso');
}
public function crear_curso(Request $request){
    $curso=new Curso;
    $curso->Grado = $request->Grado;
    $curso->save();
 return redirect()->back()->with('message','agregado exitosanmente');
}

public function actualizar_curso($id){
    $curso = Curso::find($id);
    return view('admin/curso.actualizar_curso', compact('curso'));
}

public function confirmar_curso (Request $request, $id){
    $curso = Curso::find($id);   
    $curso->Grado = $request->Grado;      
    $curso->save();      
    return redirect()->back()->with('message','actualizado exitosanmente');
}
public function borrar_curso($id){
    $curso = Curso::find($id);
    $curso->delete();
    return redirect()->back()->with('message','eliminado exitosanmente');
}

//---------------------------------------------------------------------------------
    public function ver_calendario(){
        $calendario= Calendario::all();
        return view('admin/calendario.ver_calendario',['calendario' => $calendario]);// ['curso' => $curso]
    }

    public function crear_calendario(){
        $calendario= Calendario::all();
        return view('admin/calendario.crear_calendario',['calendario' => $calendario]);// 
    }

    public function nuevo_calendario(Request $request){
        $calendario=new Calendario;
        $calendario->Descripcion = $request->Descripcion;
        $calendario->Fecha = $request->Fecha;
        $calendario->save();
        return redirect()->back()->with('message','agregado exitosanmente');
    }

}
