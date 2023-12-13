@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4"> Pagina Lista </h1>
@endsection

@section('seccion')
    <h3> Detalle estudiante </h3>

    <p> Id:                      {{ $xDetAlumnos->id }} </p>
    <p> Practica Modular 1:      {{ $xDetAlumnos->praMod1 }} </p>
    <p> Practica Modular 2:      {{ $xDetAlumnos->praMod2 }} </p>
    <p> Practica Modular 3:      {{ $xDetAlumnos->praMod3 }} </p>
    <p> Num Und Didac Mod 1:     {{ $xDetAlumnos->udMod1 }} </p>
    <p> Num Und Didac Mod 2:     {{ $xDetAlumnos->udMod2 }} </p>
    <p> Num Und Didac Mod 3:     {{ $xDetAlumnos->udMod3 }} </p>
    <p> Cert Idioma:             {{ $xDetAlumnos->cerIdi }} </p>
    <p> Modal Titulacion:        {{ $xDetAlumnos->modTit }} </p>
    <p> Fecha de Reg Detalle:    {{ $xDetAlumnos->fecDet }} </p>
    <p> Estado detalle:          {{ $xDetAlumnos->estDet }} </p>

@endsection