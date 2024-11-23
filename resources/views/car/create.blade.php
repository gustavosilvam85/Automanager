@extends('layouts.app')

@section('content')
<div>
    <div class="row justify-content-center align-items-center login" style="background-color: #9E0E15">
        <div class="card">
            <div class="card-body p-3">
                <h1 class="mb-4 text-dark">Cadastro do Carro</h1>
                <form action="{{ route('car.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="client_id" value="{{ $client->id }}">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="brand" class="form-label text-dark">Marca</label>
                            <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="model" class="form-label text-dark">Modelo</label>
                            <input type="text" name="model" id="model" class="form-control" value="{{ old('model') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="manufacture_year" class="form-label text-dark">Ano de Fabricação</label>
                            <input type="number" name="manufacture_year" id="manufacture_year" class="form-control" value="{{ old('manufacture_year') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="model_year" class="form-label text-dark">Ano do Modelo</label>
                            <input type="number" name="model_year" id="model_year" class="form-control" value="{{ old('model_year') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="plate" class="form-label text-dark">Placa</label>
                            <input type="text" name="plate" id="plate" class="form-control" value="{{ old('plate') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="color" class="form-label text-dark">Cor</label>
                            <input type="text" name="color" id="color" class="form-control" value="{{ old('color') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="fuel_type" class="form-label text-dark">Tipo de Combustível</label>
                        <select name="fuel_type" id="fuel_type" class="form-select">
                            <option value="" disabled selected>Selecione...</option>
                            <option value="Gasolina" {{ old('fuel_type') == 'Gasolina' ? 'selected' : '' }}>Gasolina</option>
                            <option value="Álcool" {{ old('fuel_type') == 'Álcool' ? 'selected' : '' }}>Álcool</option>
                            <option value="Diesel" {{ old('fuel_type') == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                            <option value="Flex" {{ old('fuel_type') == 'Flex' ? 'selected' : '' }}>Flex</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label text-dark">Observações (opcional)</label>
                        <textarea name="notes" id="notes" rows="4" class="form-control">{{ old('notes') }}</textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Cadastrar Carro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
