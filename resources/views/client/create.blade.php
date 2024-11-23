@extends('layouts.app')

@section('content')
<div>
    <div class="row justify-content-center align-items-center login" style="background-color: #9E0E15">        
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                <i class="bi bi-person-circle"></i>
                <h1 class="text-dark">Cadastro do Cliente</h1>
                </div>
                <form action="{{ route('client.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label text-dark">Nome Completo</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="birth_date" class="form-label text-dark">Data de Nascimento</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="cpf" class="form-label text-dark">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" value="{{ old('cpf') }}" maxlength="14" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-dark">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="address" class="form-label text-dark">Endereço</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="zip_code" class="form-label text-dark">CEP</label>
                            <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ old('zip_code') }}" maxlength="10" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="city" class="form-label text-dark">Cidade</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="state" class="form-label text-dark">Estado</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}" maxlength="2" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phone1" class="form-label text-dark">Telefone 1</label>
                            <input type="text" class="form-control" id="phone1" name="phone1" value="{{ old('phone1') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone2" class="form-label text-dark">Telefone 2 (opcional)</label>
                            <input type="text" class="form-control" id="phone2" name="phone2" value="{{ old('phone2') }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Cadastrar Cliente</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
