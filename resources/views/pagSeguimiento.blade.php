@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4"> Pagina Seguimiento - Carlos Calvo</h1>
@endsection


@section('seccion')
    @if(session('msj'))
        <div class="alert alert-sucess alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <form action= "" method="POST"> <!--{{ route('Estudiante.xRegistrar') }}" method="post" class="d-grid gap-2"-->
        @csrf

        @error('codEst')
            <div class="alert alert-danger">
                El <strong>Código</strong> es requerido
            </div>
        @enderror

        @error('nomEst')
            <div class="alert alert-danger">
                Los <strong>Id Estudiante</strong> son requeridos
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

        <input type="text" name="idEst" value="{{old('codEst')}}" class="form-control mb-2">
        <select name="traAct" class="form-control mb-2">
            <option value="">Esta trabajando actualmente...</option>
            <option value="SI">Si</option>
            <option value="NO">No</option>
        </select>
        <select name="ofiAct" class="form-control mb-2">
            <option value="">Seleccione trabajo actualmente...</option>
            <option value="1cp">Relacionado a Contabilidad</option>
            <option value="2cp">Relacionado a Hoteleria</option>
            <option value="3cp">Relacionado a Mecanica</option>
        </select>
        <select name="satEst" class="form-control mb-2">
            <option value="">Seleccione su satisfaccion...</option>
            <option value="0">No esta satisfecho</option>
            <option value="1">Regular</option>
            <option value="2">Bueno</option>
            <option value="3">Muy bueno</option>
        </select>
        <input type="date" name="fecSeg" value="{{old('fnaEst')}}" class="form-control mb-2">
        <select name="estSeg" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>
        <button class="btn btn-primary" type="submit">Agregar</button>
    </form>
    <br/>

    <div class="btn btn-dark fs-3 fw-bold d-grid">Lista de seguimiento</div>
    
    <table class="table">
        <thead class="table table-dark table-striped">
            <br/>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Id Est</th>
                <th scope="col">Trabajo Actual</th>
                <th scope="col">Oficio Actual</th>
                <th scope="col">Satisfacción estudiantil</th>
                <th scope="col">Fecha de seguimiento</th>
                <th scope="col">Estado de seguimiento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($xAluSeg as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->codEst }}</td>
                <td>
                    <a href="{{ route('Estudiante.xDetalle', $item->id ) }}">
                        {{ $item->apeEst }}, {{ $item->nomEst }}
                    </a>
                </td>
                 <td>
                    <form action="{{ route('Estudiante.xEliminar', $item->id) }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                    </form>
                    <a class="btn btn-warning btn-sm" href="{{ route('Estudiante.xActualizar', $item->id ) }}">
                        ...A
                    </a>
                </td> 
            </tr>
            @endforeach

        </tbody>
    </table>

    
@endsection

