@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4"> Pagina Seguimiento </h1>
@endsection


@section('seccion')
    @if(session('msj'))
        <div class="alert alert-sucess alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <form action="{{ route('Seguimiento.xUpdate', $xActSeg->id) }}" method="post" class="d-grid gap-2">
        @method('PUT')
        @csrf

        <input type="text" name="idEst" placeholder="Código" value="{{ $xActSeg->idEst }}" class="form-control mb-2">
        <select name="traAct" class="form-control mb-2">
            <option value="">Esta trabajando actualmente...</option>
            <option value="SI" @if ($xActSeg->traAct == "SI") {{ "SELECTED" }} @endif>SI</option>
            <option value="NO" @if ($xActSeg->traAct == "NO") {{ "SELECTED" }} @endif>NO</option>
        </select>
        <select name="ofiAct" class="form-control mb-2">
            <option value="">Seleccione trabajo actualmente...</option>
            <option value="1cp" @if ($xActSeg->ofiAct == "1cp") {{ "SELECTED" }} @endif>Relacionado a Contabilidad</option>
            <option value="2cp" @if ($xActSeg->ofiAct == "2cp") {{ "SELECTED" }} @endif>Relacionado a Hoteleria</option>
            <option value="3cp" @if ($xActSeg->ofiAct == "3cp") {{ "SELECTED" }} @endif>Relacionado a Mecanica</option>
        </select>
        <select name="satEst" class="form-control mb-2">
            <option value="">Esta trabajando actualmente...</option>
            <option value="0" @if ($xActSeg->satEst == 0) {{ "SELECTED" }} @endif>No esta satisfecho</option>
            <option value="1" @if ($xActSeg->satEst == 1) {{ "SELECTED" }} @endif>Regular</option>
            <option value="2" @if ($xActSeg->satEst == 2) {{ "SELECTED" }} @endif>Bueno</option>
            <option value="3" @if ($xActSeg->satEst == 3) {{ "SELECTED" }} @endif>Muy bueno</option>
        </select>
        <input type="date" name="fecSeg" placeholder="Fecha de Seguimiento" value="{{ $xActSeg->fecSeg }}" class="form-control mb-2">
        <select name="estSeg" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="0" @if ($xActSeg->estSeg == 0) {{ "SELECTED" }} @endif>Inactivo</option>
            <option value="1" @if ($xActSeg->estSeg == 1) {{ "SELECTED" }} @endif>Activo</option>
        </select>
        <button class="btn btn-primary" type="submit">Actualizar</button>
    </form>
@endsection