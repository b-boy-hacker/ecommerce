<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AcademicoController;
use App\Http\Controllers\ProcesosController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PadreController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'bienvenido']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//primera ruta creada en el Administrador
Route::get('/redirect', [AdminController::class, 'redirect']);
Route::get('/inicio', [AdminController::class, 'inicio'])->name('admin.home');

Route::get('/mostrar_usuario', [AdminController::class, 'mostrar_usuario']);
Route::get('/crear_usuario_profe', [AdminController::class, 'crear_usuario_profe']);
Route::get('/crear_usuario_alumno', [AdminController::class, 'crear_usuario_alumno']);
Route::get('/crear_usuario_padre', [AdminController::class, 'crear_usuario_padre']);
Route::post('/crear_nuevo_usuario', [AdminController::class, 'crear_nuevo_usuario']);

Route::get('/mostrar_profesor', [AdminController::class, 'mostrar_profesor']);
Route::get('/crear_profesor', [AdminController::class, 'crear_profesor']);
Route::post('/crear', [AdminController::class, 'crear']);
Route::get('/actualizar_profesor/{id}', [AdminController::class, 'actualizar_profesor']);
Route::put('/confirmar_profesor/{id}', [AdminController::class, 'confirmar_profesor']);
Route::get('/borrar_profesor/{id}', [AdminController::class, 'borrar_profesor']);


Route::get('/mostrar_alumno', [AdminController::class, 'mostrar_alumno']);
Route::get('/crear_alumno', [AdminController::class, 'crear_alumno']);
Route::post('/crear_estudiante', [AdminController::class, 'crear_estudiante']);
Route::get('/borrar_alumno/{id}', [AdminController::class, 'borrar_alumno']);
Route::get('/actualizar_alumno/{id}', [AdminController::class, 'actualizar_alumno']);
Route::put('/confirmar_alumno/{id}', [AdminController::class, 'confirmar_alumno']);

Route::get('/mostrar_padre', [AdminController::class, 'mostrar_padre']);
Route::get('/crear_padre', [AdminController::class, 'crear_padre']);
Route::post('/crear_padreFamilia', [AdminController::class, 'crear_padreFamilia']);
Route::get('/actualizar_padre/{id}', [AdminController::class, 'actualizar_padre']);
Route::put('/confirmar_padre/{id}', [AdminController::class, 'confirmar_padre']);
Route::get('/borrar_padre/{id}', [AdminController::class, 'borrar_padre']);

Route::get('/mostrar_materia', [AcademicoController::class, 'mostrar_materia']);
Route::get('/ruta_materia', [AcademicoController::class, 'ruta_materia']);
Route::post('/crear_materia', [AcademicoController::class, 'crear_materia']);
Route::get('/actualizar_materia/{id}', [AcademicoController::class, 'actualizar_materia']);
Route::put('/confirmar_materia/{id}', [AcademicoController::class, 'confirmar_materia']);
Route::get('/borrar_materia/{id}', [AcademicoController::class, 'borrar_materia']);

Route::get('/mostrar_horario', [AcademicoController::class, 'mostrar_horario']);
Route::get('/ruta_horario', [AcademicoController::class, 'ruta_horario']);
Route::post('/crear_horario', [AcademicoController::class, 'crear_horario']);
Route::get('/actualizar_horario/{id}', [AcademicoController::class, 'actualizar_horario']);
Route::put('/confirmar_horario/{id}', [AcademicoController::class, 'confirmar_horario']);
Route::get('/borrar_horario/{id}', [AcademicoController::class, 'borrar_horario']);

Route::get('/ver_calendario', [AcademicoController::class, 'ver_calendario']);
Route::get('/crear_calendario', [AcademicoController::class, 'crear_calendario']);
Route::post('/nuevo_calendario', [AcademicoController::class, 'nuevo_calendario']);

//----------------------------------------------------------------------------------
Route::get('/mostrar_curso', [AcademicoController::class, 'mostrar_curso']);
Route::get('/ruta_curso', [AcademicoController::class, 'ruta_curso']);
Route::post('/crear_curso', [AcademicoController::class, 'crear_curso']);
Route::get('/actualizar_curso/{id}', [AcademicoController::class, 'actualizar_curso']);
Route::put('/confirmar_curso/{id}', [AcademicoController::class, 'confirmar_curso']);
Route::get('/borrar_curso/{id}', [AcademicoController::class, 'borrar_curso']);

Route::get('/materia_profesor', [ProcesosController::class, 'materia_profesor']);
Route::post('/crear_materia_Profesor', [ProcesosController::class, 'crear_materia_Profesor']);

Route::get('/padre_alumno', [ProcesosController::class, 'padre_alumno']);
Route::post('/crear_padre_alumno', [ProcesosController::class, 'crear_padre_alumno']);

Route::get('/curso_profesor', [ProcesosController::class, 'curso_profesor']);
Route::post('/crear_curso_profesor', [ProcesosController::class, 'crear_curso_profesor']);

Route::get('/curso_alumno', [ProcesosController::class, 'curso_alumno']);
Route::post('/crear_curso_alumno', [ProcesosController::class, 'crear_curso_alumno']);
//-----------------------------------------------------------------------
Route::get('/profesor_inicio', [ProfesorController::class, 'profesor_inicio']);
Route::get('/lista_aulas', [ProfesorController::class, 'lista_aulas']);
Route::get('/ver_alumnos/{id}', [ProfesorController::class, 'ver_alumnos']);

Route::get('/vista_tarea/{id}', [ProfesorController::class, 'vista_tarea']);
Route::post('/crear_tarea/{id}', [ProfesorController::class, 'crear_tarea']);

Route::get('/tarea_enviada', [ProfesorController::class, 'vista_tarea']);

// Route::put('/confirmar_tarea/{id}', [ProfesorController::class, 'confirmar_tarea']);
// Route::get('/borrar_tarea/{id}', [ProfesorController::class, 'borrar_tarea']);


//------------------------------------------------------------------------------

Route::get('/alumno_inicio', [AlumnoController::class, 'alumno_inicio']);
Route::get('/alumno_tarea', [AlumnoController::class, 'alumno_tarea']);

//------------------------------------------------------------------------------

Route::get('/padre_inicio', [PadreController::class, 'padre_inicio']);
Route::get('/hijo', [PadreController::class, 'hijo']);
Route::get('/hijo_tarea/{id}', [PadreController::class, 'hijo_tarea']);

