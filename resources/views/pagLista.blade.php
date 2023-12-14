@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4"> Pagina Lista - Carlos Calvo</h1>
@endsection


@section('seccion')
    @if(session('msj'))
        <div class="alert alert-sucess alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <form action="{{route('Estudiante.xRegistrar') }}" method="post" class="d-grid gap-2">
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

        <input type="text" name="codEst" placeholder="Código" value="{{old('codEst')}}" class="form-control mb-2">
        <input type="text" name="nomEst" placeholder="Nombres" value="{{old('nomEst')}}" class="form-control mb-2">
        <input type="text" name="apeEst" placeholder="Apellidos" value="{{old('apeEst')}}" class="form-control mb-2">
        <input type="date" name="fnEst" placeholder="Fecha de nacimiento" value="{{old('fnEst')}}" class="form-control mb-2">
        <select name="turMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="1">Turno día</option>
            <option value="2">Turno noche</option>
            <option value="3">Turno tarde</option>
        </select>
        <select name="semMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            @for($i=0; $i < 7; $i++)
                <option value="{{$i}}">Semestre {{$i}}</option>
            @endfor
        </select>
        <select name="estMat" class="form-control mb-2">
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
                <th scope="col">Código</th>
                <th scope="col">Apellidos y Nombres</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach($xAlumnos as $item)
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

    {{ $xAlumnos->links() }}
    
@endsection

