
<!doctype html>
<html lang="en">

<head>
    <!-- IMPORTAMOS LA CARPETA PUBLIC/CSS -->
    <base href="/public">

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
        .boton {
          font-size: 20px;
          text-align: center;
      }
  
      .boton a {
          display: inline-block;
          padding: 5px 10px;
          margin: 5px;
          background-color: #000; /* Color de fondo */
          color: white; /* Color del texto */
          text-decoration: none; /* Quita el subrayado */
          border-radius: 5px; /* Agrega bordes redondeados */
      }
  
      .boton a:hover {
          background-color: darkcyan; /* Cambia el color de fondo al pasar el mouse */
      }
       
      .div_center{
            text-align: center;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
         /*   height: 110vh; /* Altura total de la ventana */
        }
        .font_size{
            text-align: center; 
            font-size: 35px;  
            font-weight: bold; /* Ajuste de la posición vertical */
        }
        .text_color{
            color: black;
            width: 350px; /* Ancho de los campos de entrada */
            padding-bottom: 20px;
        }
        label{
            display: inline-block;
            font-size: 25px;
            width: 180px;
        }
        .div_design{
            padding-bottom: 15px;
        }

    .boton_enviar {
          font-size: 20px;
          text-align: center;
          background-color: teal; /* Color de fondo */
          color: white;
          padding: 5px 10px;
          border-radius: 5px; /* Agrega bordes redondeados */
      }

  
      .boton_enviar:hover {
          background-color: darkblue; /* Cambia el color de fondo al pasar el mouse */
      }
       /* Estilo para la alerta de éxito */
.custom-alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
}

/* Estilo para el botón de cerrar */
.close {
    float: right;
    font-size: 20px;
    font-weight: bold;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: 0.5;
}
 
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
            {{-- Bienvenido --}}
        </a>

        {{-- {{$alumno->Nombre}} --}} 
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
                </li>

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Notificacion
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                         --}}
                           
                        
                        {{-- {{-- <a class="dropdown-item" href="#">Action</a> --}}
                        {{-- <a class="dropdown-item" href="#">Tarea</a>
                        <a class="dropdown-item" href="#"></a> 
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
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

        @if (session()->has('message'))
            <div class="custom-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session()->get('message') }}
            </div>
        @endif

            <h1 style="text-align: center;">Enviar tarea a</h1>

            <div class="div_center">
                <form action="{{ url('crear_tarea', $alumno->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    {{-- <div class="div_design">
                        <label class="text-align:center;">Alumno</label>
                        <select class="text_color form-control form-control-sm" name="alumnoID" required="">
                            <option value="" selected>Seleccionar usuario...</option>
                            <option value="{{ $alumno->id }}">{{ $alumno->Nombre }}</option>
                        </select>
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Materia</label>
                        <select class="text_color form-control form-control-sm" name="materia" required="">
                            <option value="" selected>Seleccionar materia...</option>
                            @foreach ($materiaProf as $mater)
                                <option value="{{ $mater->nombre_materia }}">{{ $mater->nombre_materia }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="div_design">
                        <label class="text-align:center;">Alumno</label>
                        <select class="text_color" name="alumnoID" required="">
                            <option value="" selected>Seleccionar usuario...</option>
                            <option value="{{ $alumno->id }}">{{ $alumno->Nombre }}</option>
                        </select>
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Materia</label>
                        <select class="text_color" name="materia" required="">
                            <option value="" selected>Seleccionar materia...</option>
                            @foreach ($materiaProf as $mater)
                                <option value="{{ $mater->nombre_materia }}">{{ $mater->nombre_materia }}</option>
                            @endforeach
                        </select>
                    </div>

                    
                    <div class="div_design">
                        <label class="text-align:center;">Tema</label>
                        <input class="text_color" type="text" name="Tema" required="">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Fecha</label>
                        <input class="text_color" type="text" name="FechaEntrega" required="">
                    </div>

                    <div class="form-group">
                        <label for="Imagen">Imagen: </label>                      
                        <input class="form-control" type="file" name="Imagen" required="">                  
                    </div>  
                                        <br>
                    <div class="div_design">
                        <button type="submit" value="enviar" class="boton_enviar">
                            enviar  
                        </button>                     
                    </div>
                </form>
            </div> 
                        

        </div>
    </div>
</div>

              
            
        

    {{-- <?php include('addModal.php'); ?> --}}
    @include('profesor.procesos.addModal')
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



