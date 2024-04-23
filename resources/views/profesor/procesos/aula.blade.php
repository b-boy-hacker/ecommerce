{{-- ESTO LO AGREGAMOS PARA IMPORTAR DESDE FIREBASE --}}
{{-- imp {getDoc} export 'fireStore/firebase';
imp app export '..js/fisebase.js' --}}
{{-- -------------------------------------------------------------------------- --}}
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Agenda</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    {{-- AGREGAMOS ESTO --}}
    <link href="bootstr/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstr/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <style type="text/css">
          
      </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
            @if(Auth::check())
                            <span class="navbar-text">
                                Bienvenido profesor: {{ Auth::user()->name }}
                            </span>
            @endif
        </a>

       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('profesor_inicio')}}">Inicio <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{url('lista_aulas')}}">Aula</a>
                    {{--
                </li>

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Aula
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        {{-- {{-- <a class="dropdown-item" href="#">Action</a> 
                        <a class="dropdown-item" href="#">Primero A</a>
                        <a class="dropdown-item" href="#">Segundo A</a> 
                    </div>
                </li> --}}
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-info">Cerrar Sesión</button>
            </form>
            {{-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form> --}}

        </div>
    </nav>
{{-- -------------------------CODIGO DEL CRUD------------------------------------------------ --}}
    <div class="container">
            @if (session()->has('message'))
            <div class="alert alert-success">
                            <button type="button" class="close"
                                    data-dismiss="alert" aria-hidden="true">
                                X
                            </button>
                                {{session()->get('message')}}
                        </div>
            @endif
        
        <h2 class="page-header text-center">Lista de Cursos</h2>
        <div class="row">
             <div class="col-sm-12">           
                {{-- <a href="#addModalNew" class="btn btn-success" data-toggle="modal">
                    {{-- <span class="fa fa-plus"></span>
                    <i class="fa-solid fa-user-plus"></i>
                    Crear
                </a> --}}
            
                <table class="table table-bordered table-striped" 
                    style="margin-top: 20px; text-align: center">
                    <thead style="background-color: teal">
                        <th style="color: white">Curso</th>
                        <th style="color: white; ">Acciones</th>
                    </thead>
                    <tbody >
                        @foreach ($aulas as $curso)
                        <tr>
                            <td>{{ $curso->Grado }}</td>                         
                            <td> 
                                <div>
                                    <a href="{{url('ver_alumnos', $curso->id)}}" class="btn btn-secondary">
                                    {{-- data-toggle="modal" data-target="#modalAlumno{{ $curso->id }} --}}
                                        <i class="fa-solid fa-user-plus"></i> Ver alumnos
                                    </a>
                                </div>
                            </td>                        
                        </tr>
                        @endforeach
                    <!-- Modal para mostrar los detalles de los alumnos -->
                        {{-- @foreach ($aulas as $curso)
                        <div id="modalAlumno{{ $curso->id }}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Detalles de los alumnos de {{ $curso->Grado }}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Aquí se mostrarán los detalles de los alumnos -->
                                        @foreach ($alumno as $al)
                                            <p>{{ $al->nombre_alumno }} {{ $al->apellido_alumno }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach  --}}

                    </tbody>
                </table>
            </div>
        </div>
    
        


    </div><!-- /.container -->
    {{-- <?php include('modalAlumno.php'); ?> --}}
    {{-- @include('profesor.procesos.modalAlumno') --}}
{{-- -------------------------CODIGO DEL CRUD------------------------------------------------ --}}

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="bootstr//js/vendor/popper.min.js"></script>
    <script src="bootstr/js/bootstrap.min.js"></script>
</body>

</html>




{{-- <x-app-layout>
    <style type="text/css">
     
      .boton {
          font-size: 20px;
          text-align: center;
      }
  
      .boton a {
          display: inline-block;
          padding: 10px 20px;
          margin: 5px;
          background-color: darkblue; /* Color de fondo */
          color: white; /* Color del texto */
          text-decoration: none; /* Quita el subrayado */
          border-radius: 5px; /* Agrega bordes redondeados */
      }
  
      .boton a:hover {
          background-color: darkcyan; /* Cambia el color de fondo al pasar el mouse */
      }
       
        .div_center{
        color: black; 
        text-align: center;
        font-weight: bold;
        font-size: 25px;
    }

    table {
        max-width: 60%;
        border: 1px solid #000;
        margin: auto;
    }
    th, td {
        
        width: 50%;
        text-align: left;
        vertical-align: top;
        border: 1px solid #000;
        border-collapse: collapse;
        padding: 0.3em;
        caption-side: bottom;
    }
    caption {
        padding: 0.3em;
        color: #fff;
            background: #c84747;
    }
    th {
        background: #3A4546;
    }
    .th_deg{
        color: whitesmoke;
        text-align: center
    }

    .th_degA{
        color: whitesmoke;
        text-align: center
    }
    .boton_editar {
        background-color: teal;
        color: white;
        padding: 8px 16px; /* Ajusta el espaciado interno según sea necesario */
        border: none; /* Elimina el borde */
        border-radius: 4px; /* Agrega bordes redondeados */
        text-decoration: none; /* Elimina el subrayado del enlace */
    }

    .boton_editar:hover {
        background-color: darkgreen; /* Cambia el color de fondo al pasar el ratón sobre el botón */
    }

    .boton_eliminar {
        background-color: red;
        color: white;
        padding: 8px 16px; /* Ajusta el espaciado interno según sea necesario */
        border: none; /* Elimina el borde */
        border-radius: 4px; /* Agrega bordes redondeados */
        text-decoration: none; /* Elimina el subrayado del enlace */
    }

    .boton_eliminar:hover {
        background-color: darkgreen; /* Cambia el color de fondo al pasar el ratón sobre el botón */
    }
    </style>

<div class="boton">
    <a href="{{url('profesor_inicio')}}">Inicio</a>
    <a href="{{url('lista_aulas')}}">Aulas</a>
    {{-- <a href="">Practicos</a>   
  </div>


<div class="div_center">
    <p>Lista de Aulas</p>
</div>

    @if (session()->has('message'))
    <div class="alert alert-success">
                    <button type="button" class="close"
                            data-dismiss="alert" aria-hidden="true">
                        X
                    </button>
                        {{session()->get('message')}}
                </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="th_deg" scope="col">Nombre del Curso</th>
                    <th class="th_degA" scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>   
                @foreach ($aulas as $curso)
                <tr>
                     <td>{{ $curso->Grado }}</td>     
                    {{-- <td>{{ $curso->nombre_alumno }}</td> --}}
                    {{-- <td>{{ $curso->apellido_alumno }}</td> 
                                  <td> 
                        <div style="display: flex; justify-content: space-between;">
                            <a class="boton_editar" 
                            href="{{url('ver_alumnos')}}">Ver Alumnos</a>
                            {{-- {{url('actualizar_alumno', $alumno->id)}} --}}

                            {{-- <a class="boton_eliminar" onclick="return confirm('¿Estás seguro?')"
                            href="">eliminar</a> --}}
                            {{-- {{url('borrar_alumno', $alumno->id)}}
                        </div>
                    </td>                        
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
      
      
  </x-app-layout>
   --}}