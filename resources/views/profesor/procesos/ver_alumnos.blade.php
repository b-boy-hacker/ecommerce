
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
          .imagen {
              text-align: center; /* Para centrar horizontalmente */
          }
           .imagen img {
              width: 100%; /*Define el ancho máximo de la imagen*/
              height: 100%;  /*Permite que la altura se ajuste automáticamente para mantener la proporción*/ 
          }  

          .div_center{
        color: black; 
        text-align: center;
        font-weight: bold;
        font-size: 35px;
        padding: 20px;
    }

    table {
        width: 70%;
        border: 1px solid #000;
        margin: auto;
    }

    th, td {
        text-align: center;
        border: 1px solid #000;
        padding: 10px; /* Ajusta este valor según el espaciado que desees */
    }

    th {
        background: teal;
    }
    .th_deg{
        color: whitesmoke;
        text-align: center
    }
    .img_size{
                width: 100px;
                height: 100px;
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
    <div class="container">
        
        <div class="div_center">
            <p>Lista de Alumnos del {{$curso->Grado}}</p>
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
                            <th class="th_deg" scope="col">Nombre</th>
                            <th class="th_deg" scope="col">Apellido Paterno</th>
                            <th class="th_deg" scope="col">Apellido Materno</th>
                            <th class="th_deg" scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>   
                        @foreach ($alumnos as $alumno)
                        <tr>
                             <td>{{ $alumno->nombre_alumno}}</td>
                             <td>{{ $alumno->apellido_alumno1 }}</td> 
                             <td>{{ $alumno->apellido_alumno2 }}</td>     
                            <td>
                                <a href="{{url('vista_tarea', $alumno->id)}}" 
                                    class="boton_tarea">
                                    enviar tarea
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
              
            
        

    </div><!-- /.container -->
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



