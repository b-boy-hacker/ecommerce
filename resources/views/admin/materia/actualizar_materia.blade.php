@extends('adminlte::page')
@section('title', 'agenda-escolar')

@section('content_header')
    <style type="text/css">
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
            width: 180px;
        }
        .div_design{
            padding-bottom: 15px;
        }
    </style>
    <p class="font_size">Actualizar Materia</p>
    <div style="text-align: center;">
        <div style="color: white; display: inline-block;">
            <a class="btn btn-info" href="{{url('mostrar_materia')}}">
                Regresar</a>
        </div>
    </div>
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            @if (session()->has('message'))
                <div class="alert alert-success">
                                <button type="button" class="close"
                                          data-dismiss="alert" aria-hidden="true">
                                       X
                                  </button>
                                      {{session()->get('message')}}
                             </div>
            @endif


            {{-- <p class="font_size">CREAR PROFESOR</p>    --}}
            <div class="div_center">
                <form action="{{url('/confirmar_materia', $materia->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="div_design">
                        <label class="text-align:center;">Nombre</label>
                        <input class="text_color" type="text" name="Nombre" 
                            placeholder="Escribe tu nombre" required=""
                            value="{{$materia->Nombre}}">
                    </div>
                    
                   
                    <div class="div_design">
                        <input type="submit" value="Actualizar materia" class="btn btn-primary">                        
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>

@stop

