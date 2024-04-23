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
use App\Models\Rol;

class AdminController extends Controller
{
    public $modalCrear = false;
    
    public function redirect(){
        $usertype = Auth::user()->usertype;
        if ($usertype == '1'){
            return view('admin/inicio.home');
        }
        if ($usertype == '2'){
            return view('profesor.profesor_inicio');
        }
        if ($usertype == '3'){
            return view('alumno.alumno_inicio');
        }
        if ($usertype == '4'){
            return view('padre.padre_inicio');
        }
    }

    public function inicio(){
        return view('admin/inicio.home');
    }
/*------------------------------------------------------------------------------*/
public function mostrar_usuario(){
    $usuario = User::all(); // Suponiendo que Profesor es el modelo que representa la tabla de profesores
    return view('admin/usuario.mostrar_usuario', ['usuario' => $usuario]);
}
public function crear_usuario_profe(){
    $usuario = User::all();
    $profe = Profesor::all();
    $rol = Rol::all();
    return view('admin/usuario.crear_usuario_profe', compact('usuario','profe', 'rol'));
}

public function crear_usuario_alumno(){
    $usuario = User::all();
    $alumno = Alumno::all();
    $rol = Rol::all();
    return view('admin/usuario.crear_usuario_alumno',
     compact('usuario','alumno', 'rol'));
}

public function crear_usuario_padre(){
    $usuario = User::all();
    $padre = Padre::all();
    $rol = Rol::all();
    return view('admin/usuario.crear_usuario_padre',
     compact('usuario','padre', 'rol'));    
}

public function crear_nuevo_usuario(Request $request){
    $existingUsuario = User::where('id', $request->id)->first();

    // Si el ID ya existe, devuelve un mensaje de error
    if ($existingUsuario) {
        return redirect()->back()->with('error', 'El ID ya está en uso. Por favor, elige otro ID.');
    }

    $usuario=new User;
    $usuario->id= $request->id;
    $usuario->name= $request->name;
    $usuario->rol= $request->rol;
    $usuario->usertype= $request->usertype;
    $usuario->email= $request->email;
    $usuario->password = bcrypt($request->password);
    $usuario->save();
    return redirect()->back()->with('message','agregado exitosanmente');
}

/*------------------------------------------------------------------------------*/
    public function mostrar_profesor(){
        $usuario = User::all();
        $usuarioProfe = Profesor::all();
        return view('admin/profesor.mostrar_profesor', 
                compact('usuario', 'usuarioProfe'));
    }

    public function crear_profesor(){
            $usuarios = User::all(); // Obtener todos los usuarios disponibles
            return view('admin/profesor.crear_profesor', compact('usuarios'));  
    }
    public function crear(Request $request){
        $usuarioProfe=new Profesor;
        $usuarioProfe->CI = $request->CI;
        $usuarioProfe->Nombre = $request->Nombre;
        $usuarioProfe->ApellidoPaterno = $request->ApellidoPaterno;
        $usuarioProfe->ApellidoMaterno = $request->ApellidoMaterno;      
        $usuarioProfe->Sexo = $request->Sexo;
        $usuarioProfe->Telefono = $request->Telefono;
        $usuarioProfe->Correo = $request->Correo;
        $usuarioProfe->Direccion = $request->Direccion;
        $usuarioProfe->FechaNacimiento = $request->FechaNacimiento;
        $usuarioProfe->FechaRegistro = $request->FechaRegistro;
        $usuarioProfe->save();
     return redirect()->back()->with('message','agregado exitosanmente');
    }

    public function actualizar_profesor($id){
        $buscar = Profesor::find($id);
        return view('admin/profesor.actualizar_profesor', compact('buscar'));
    }

    public function confirmar_profesor (Request $request, $id){
        $profe = Profesor::find($id);   
        $profe->CI = $request->CI;
        $profe->Nombre = $request->Nombre;
        $profe->ApellidoPaterno = $request->ApellidoPaterno;
        $profe->ApellidoMaterno = $request->ApellidoMaterno;
        $profe->Telefono = $request->Telefono;
        $profe->Correo = $request->Correo;
        $profe->Direccion = $request->Direccion;
        $profe->FechaNacimiento = $request->FechaNacimiento;
        $profe->FechaRegistro = $request->FechaRegistro;
        $profe->save();
        return redirect()->back()->with('message','actualizado exitosamente');
    }
    public function borrar_profesor($id){
        $borrar = Profesor::find($id);
        $borrar->delete();
        return redirect()->back()->with('message','eliminado exitosanmente');
    }

/*------------------------------------------------------------------------------*/
    public function mostrar_alumno(){
        $estudiante = Alumno::all(); // Suponiendo que Profesor es el modelo que representa la tabla de profesores
        return view('admin/alumno.mostrar_alumno', ['estudiante' => $estudiante]);
    }
    public function crear_alumno(){
        return view('admin/alumno.crear_alumno');
    }

    public function crear_estudiante(Request $request){
        $estudiante=new Alumno;
        $estudiante->CI = $request->CI;
        $estudiante->Nombre = $request->Nombre;
        $estudiante->ApellidoPaterno = $request->ApellidoPaterno;
        $estudiante->ApellidoMaterno = $request->ApellidoMaterno;
        $estudiante->Sexo = $request->Sexo;
        $estudiante->Correo = $request->Correo;
        $estudiante->Direccion = $request->Direccion;
        $estudiante->FechaNacimiento = $request->FechaNacimiento;
        $estudiante->FechaRegistro = $request->FechaRegistro;
        $estudiante->save();
        return redirect()->back()->with('message','agregado exitosanmente');
    }

    public function borrar_alumno($id){
        $borrar = Alumno::find($id);
        $borrar->delete();
        return redirect()->back()->with('message','eliminado exitosanmente');
    }

   
   
    public function actualizar_alumno($id){
        $buscar = Alumno::find($id);
        return view('admin/alumno.actualizar_alumno', compact('buscar'));
    }

    public function confirmar_alumno (Request $request, $id){
        $alumno = Alumno::find($id);   
        $alumno->CI = $request->CI;
        $alumno->Nombre = $request->Nombre;
        $alumno->ApellidoPaterno = $request->ApellidoPaterno;
        $alumno->ApellidoMaterno = $request->ApellidoMaterno;
        $alumno->Sexo = $request->Sexo;
        $alumno->Correo = $request->Correo;
        $alumno->Direccion = $request->Direccion;
        $alumno->FechaNacimiento = $request->FechaNacimiento;
        $alumno->FechaRegistro = $request->FechaRegistro;
        $alumno->save();      
        return redirect()->back()->with('message','actualizado exitosanmente');
    }

/*----------------------------------------------------------------------------------- */
    public function mostrar_padre(){
        $papa = Padre::all(); // Suponiendo que Profesor es el modelo que representa la tabla de profesores
        return view('admin/padre.mostrar_padre', ['papa' => $papa]);
    }
    public function crear_padre(){
        return view('admin/padre.crear_padre');
    }
    public function crear_padreFamilia(Request $request){
        $papa=new Padre;
        $papa->CI = $request->CI;
        $papa->Nombre = $request->Nombre;
        $papa->ApellidoPaterno = $request->ApellidoPaterno;
        $papa->ApellidoMaterno = $request->ApellidoMaterno;
        $papa->Sexo = $request->Sexo;
        $papa->Telefono = $request->Telefono;
        $papa->Correo = $request->Correo;
        $papa->Direccion = $request->Direccion;
        $papa->FechaNacimiento = $request->FechaNacimiento;
        $papa->FechaRegistro = $request->FechaRegistro;
        $papa->Parentesco = $request->Parentesco;
        $papa->save();
     return redirect()->back()->with('message','agregado exitosanmente');
    }

    public function actualizar_padre($id){
        $papa = Padre::find($id);
        return view('admin/padre.actualizar_padre', compact('papa'));
    }

    public function confirmar_padre (Request $request, $id){
        $papa = Padre::find($id);   
        $papa->CI = $request->CI;
        $papa->Nombre = $request->Nombre;
        $papa->ApellidoPaterno = $request->ApellidoPaterno;
        $papa->ApellidoMaterno = $request->ApellidoMaterno;
        $papa->Correo = $request->Correo;
        $papa->Direccion = $request->Direccion;
        $papa->FechaNacimiento = $request->FechaNacimiento;
        $papa->FechaRegistro = $request->FechaRegistro;
        $papa->Parentesco = $request->Parentesco;
        $papa->save();      
        return redirect()->back()->with('message','actualizado exitosanmente');
    }
    public function borrar_padre($id){
        $borrar = Padre::find($id);
        $borrar->delete();
        return redirect()->back()->with('message','eliminado exitosanmente');
    }
/*----------------------------------------------------------------------------------- */

}
