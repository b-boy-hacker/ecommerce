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
    <p class="font_size">Calendario Académico</p>
    {{-- <div style="text-align: center;">
        <div style="color: white; display: inline-block;">
            <a class="btn btn-info" href="#">
                crear</a>
        </div>
    </div> --}}
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


            <a href="#modalCalendario" class="btn btn-primary" data-toggle="modal">
                <span class="fa fa-plus"></span>
                <i class="fa-solid fa-user-plus"></i>
                Crear calendario
            </a>

            <table class="table table-bordered table-striped" 
            style="margin-top: 20px; text-align: center">
            <thead style="background-color: #3A4546">
                <th style="color: white">Descripcion</th>
                <th style="color: white; ">Fecha</th>
            </thead>
            <tbody >
                @foreach ($calendario as $calender)
                   <tr>
                        <td>{{$calender->Descripcion}}</td>
                        <td>{{$calender->Fecha}}</td>
                   </tr>
                @endforeach
            </tbody>
        </table>
            
        </div>
    </div>
</div>

@include('admin.calendario.modalCalendario')
@stop

