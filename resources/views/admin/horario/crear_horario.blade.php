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
            /*height: 70vh; /* Altura total de la ventana */
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
    <p class="font_size">Crear Horario</p>
    <div style="text-align: center;">
        <div style="color: white; display: inline-block;">
            <a class="btn btn-info" href="{{url('mostrar_horario')}}">
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
                <form action="{{url('/crear_horario')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="div_design">
                        <label class="text-align:center;">Hora</label>
                        <input class="text_color" type="time" name="Hora" 
                            placeholder="" required="">
                    </div>
                    
                   
                    {{-- <div class="div_design">
                        <label class="text-align:center;">Foto del profesor</label>
                        <input type="file" name="photo" id="" required="">
                    </div> --}}
                    {{--<div class="div_design">
                        <label class="text-align:center;">Categoria del producto</label>
                        <select class="text_color" name="catagory" required="">
                             <option value="" selected="">seleccionar</option>
                            @foreach ($catagory as $catagory)
                                <option value="{{$catagory->catagory_name}}"> 
                                    {{$catagory->catagory_name}} </option>
                            @endforeach  
                            </select>
                    </div>--}}
                    <div class="div_design">
                        <input type="submit" value="Registrar Horario" class="btn btn-primary">                        
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>

@stop
