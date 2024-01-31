@extends('templates.base')
@section('title', 'Crear orden')
@section('header', 'Crear orden')
@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="#" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-lg-4 mb-4">
                        <label for="legalization_date">Fecha de legalización</label>
                        <input type="date" class="form-control"
                        id="legalization_date" name="legalization_date" required>    
                    </div>
                    <div class="col-lg-4 mb-4">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control"
                        id="address" name="address" required>    
                    </div>
                    <div class="col-lg-4 mb-4">
                        <label for="city">Ciudad</label>
                        <select name="city" id="city"
                            class="form-control" required>
                            <option value="Tuluá">Tuluá</option>
                            <option value="Buga">Buga</option>
                            <option value="Cali">Cali</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="observation_id">Observación</label>
                        <select name="observation_id" id="observation_id"
                            class="form-control" required>
                            <option value="Ninguna">Ninguna</option>
                        </select>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="causal_id">Causal</label>
                        <select name="causal_id" id="causal_id"
                            class="form-control" required>
                            <option value="Suspensión del servicio">Suspensión del servicio</option>
                            <option value="Cancelación del servicio">Cancelación del servicio</option>
                            <option value="Cambio de contador">Cambio de contador</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <button class="btn btn-primary btn-block" type="submit">
                            Guardar
                        </button>                        
                    </div>
                    <div class="col-lg-6 mb-4">
                        <a href="{{ route('order.index') }}" class="btn btn-secondary btn-block">
                            Cancelar
                        </a> 
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="alert alert-warning" role="alert">
                        <i class="fa-solid fa-lightbulb"></i> Para 
                        añadir actividades a la orden primero debe
                        crearla y luego dar clic en la acción Editar.
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection