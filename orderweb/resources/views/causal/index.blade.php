@extends('templates.base')
@section('title', 'Listado causal')
@section('header', 'Listado causal')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip gap-2 d--md-block">
            <a href="{{ route('causal.create') }}" class="btn btn-primary">Crear</a>
        </div>
    </div>

    @include('templates.messages')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_data" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($causals as $causal)
                        <tr>
                            <td>{{ $causal['id'] }}</td>
                            <td>{{ $causal['description'] }}</td>
                            <td>
                                <a href="{{ route('causal.edit', $causal['id']) }}" title="editar" 
                                    class="btn btn-info btn-circle btn-sm">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('causal.destroy', $causal['id']) }}" title="eliminar" 
                                    class="btn btn-danger btn-circle btn-sm"
                                    onclick="return remove()">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection
