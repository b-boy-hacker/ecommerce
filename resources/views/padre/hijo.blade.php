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
          .imagen {
              text-align: center; /* Para centrar horizontalmente */
          }
           .imagen img {
              width: 100%; /*Define el ancho máximo de la imagen*/
              height: 100%;  /*Permite que la altura se ajuste automáticamente para mantener la proporción*/ 
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
                         <td> 
      </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
            @if(Auth::check())
                            <span class="navbar-text">
                                Bienvenido Señor/a: {{ Auth::user()->name }}
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
                    <a class="nav-link" href="{{url('padre_inicio')}}">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('hijo')}}">Mis Hijos</a>                    
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
     
          <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="th_deg" scope="col">Nombre</th>
                        <th class="th_deg" scope="col">Apellido</th>
                        <th class="th_deg" scope="col">Tarea</th>
                    </tr>
                </thead>
                <tbody>   
                    @foreach ($alumnos as $kid)
                    <tr>
                         <td>{{ $kid->nombAlumno }}</td>                      
                         <td>{{ $kid->apellPa }}</td> 
                         <td>
                            <a href="{{url('hijo_tarea', $kid->alumID)}}">ver</a>
                         </td>
                         {{-- <td> --}}
                            {{-- <img class="img_size" src="/tarea/{{$tareas->Imagen}}"> --}}
                            {{-- <a href="/tarea/{{$tareas->Imagen}}" target="_blank">Ver</a>...
                            <a href="/tarea/{{$tareas->Imagen}}" download>Descargar</a>
                        </td>                       --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>




    </div><!-- /.container -->
    {{-- <?php include('addModal.php'); ?> --}}
    {{-- @include('profesor.procesos.addModal') --}}
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
        .imagen {
            text-align: center; /* Para centrar horizontalmente */
        }

         
         .imagen img {
           
            width: 1535px; /*Define el ancho máximo de la imagen*/
            height: 550px;  /*Permite que la altura se ajuste automáticamente para mantener la proporción*/ 
        }  
    </style>

<div class="boton">
    <a href="{{url('profesor_inicio')}}">Inicio</a>
    <a href="{{url('lista_aulas')}}">Aulas</a>
    {{-- <a href="{{url('aula')}}">Practicos</a>  
  </div>
  
      
      <div class="imagen">
        <img src="imagen/3.jpg" alt="">
      </div>
  </x-app-layout>

   --}}

