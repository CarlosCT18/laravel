@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4"> Pagina Lista </h1>
@endsection


@section('seccion')
    @if(session('msj'))
        <div class="alert alert-sucess alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <form action="{{ route('Estudiante.xUpdate', $xActAlumnos->id) }}" method="post" class="d-grid gap-2">
        @method('PUT')
        @csrf

        @error('codEst')
            <div class="alert alert-danger">
                El <strong>Código</strong> es requerido
            </div>
        @enderror

        @error('nomEst')
            <div class="alert alert-danger">
                Los <strong>Nombres</strong> son requeridos
            </div>
        @enderror

        @if($errors ->has('apeEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Los <strong>Apellidos</strong> son requeridos
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        
        @error('fnEst')
            <div class="alert alert-danger">
                La fecha de nacimiento es requerida
            </div>
        @enderror

        @error('turMat')
            <div class="alert alert-danger">
                El turno de matricula es requerido
            </div>
        @enderror

        @error('semMat')
            <div class="alert alert-danger">
                El semestre de matricula es requerido
            </div>
        @enderror

        @error('estMat')
            <div class="alert alert-danger">
                El estado de estudiante es requerido
            </div>
        @enderror
                    
        @endif

        <input type="text" name="codEst" placeholder="Código" value="{{ $xActAlumnos->codEst }}" class="form-control mb-2">
        <input type="text" name="nomEst" placeholder="Nombres" value="{{ $xActAlumnos->nomEst }}" class="form-control mb-2">
        <input type="text" name="apeEst" placeholder="Apellidos" value="{{ $xActAlumnos->apeEst }}" class="form-control mb-2">
        <input type="date" name="fnEst" placeholder="Fecha de nacimiento" value="{{ $xActAlumnos->fnEst }}" class="form-control mb-2">
        <select name="turMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="1" @if ($xActAlumnos->turMat == 1) {{ "SELECTED" }} @endif>Turno día(1)</option>
            <option value="2" @if ($xActAlumnos->turMat == 2) {{ "SELECTED" }} @endif>Turno noche(2)</option>
            <option value="3" @if ($xActAlumnos->turMat == 3) {{ "SELECTED" }} @endif>Turno tarde(3)</option>
        </select>
        <select name="semMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            @for($i=0; $i < 7; $i++)
                <option value="{{$i}}" @if ($xActAlumnos->semMat == $i) {{ "SELECTED" }} @endif>Semestre {{$i}}</option>
            @endfor
        </select>
        <select name="estMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="0" @if ($xActAlumnos->estMat == 0) {{ "SELECTED" }} @endif>Inactivo</option>
            <option value="1" @if ($xActAlumnos->estMat == 1) {{ "SELECTED" }} @endif>Activo</option>
        </select>
        <button class="btn btn-primary" type="submit">Actualizar</button>
    </form>
@endsection