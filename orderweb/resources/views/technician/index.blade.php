@extends('templates.base')
@section('title', 'Listado de técnicos')
@section('header', 'Listado de técnicos')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip gap-2 d--md-block">
            <a href="{{ route('technician.create') }}" class="btn btn-primary">Crear</a>
        </div>
    </div>

    @include('templates.messages')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_data" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technicians as $technician)
                    <tr>
                        <td>{{ $technician['document'] }}</td>
                        <td>{{ $technician['name'] }}</td>
                        <td>{{ $technician['especiality'] }}</td>
                        <td>{{ $technician['phone'] }}</td>
                        <td>
                            <a href="{{ route('technician.edit', $technician['document']) }}" title="editar" 
                                class="btn btn-info btn-circle btn-sm">
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="{{ route('technician.destroy', $technician['document']) }}" title="eliminar" 
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
