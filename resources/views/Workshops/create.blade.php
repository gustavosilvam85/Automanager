@extends('layouts.app')

@section('content')
    <div>
        <div class="row justify-content-center align-items-center login" style="background-color: #1B1B1B">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="card m-5" style="background-color: #9E0E15">
            <div class="card-body">
                <h2 class="text-light">Cadastro</h2>
                <p class="text-light" >Dê o primeiro passo para otimizar sua oficina! Preencsha seus dados e ganhe mais controle e organização.</p>
                <form action="{{ route('workshops.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="company_name">Nome da Empresa:</label>
                <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}" required>
                @error('company_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="corporate_name">Razão Social:</label>
                    <input type="text" class="form-control" id="corporate_name" name="corporate_name" value="{{ old('corporate_name') }}">
                    @error('corporate_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{ old('cnpj') }}" required>
                    @error('cnpj')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="address">Endereço:</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="zip_code">CEP:</label>
                    <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ old('zip_code') }}" required>
                    @error('zip_code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="city">Cidade:</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                    @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="state">Estado:</label>
                    <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}" required>
                    @error('state')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="phone1">Telefone 1:</label>
                    <input type="text" class="form-control" id="phone1" name="phone1" value="{{ old('phone1') }}" required>
                    @error('phone1')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="phone2">Telefone 2:</label>
                    <input type="text" class="form-control" id="phone2" name="phone2" value="{{ old('phone2') }}">
                    @error('phone2')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col">
                    <label for="owner">Proprietario</label>
                    <input type="text" class="form-control" id="owner" name="owner" value="{{ old('owner') }}">
                    @error('owner')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Senha:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-dark">Cadastrar</button>
        </form>
        </div>
        </div>
        </div>
    </div>

    @push('scripts')
        <script>
            Inputmask("99.999.999/9999-99").mask(document.getElementById("cnpj"));
            Inputmask("99999-999").mask(document.getElementById("zip_code"));
            Inputmask("(99) 99999-9999").mask(document.getElementById("phone1"));
            Inputmask("(99) 99999-9999").mask(document.getElementById("phone2"));
        </script>
    @endpush
@endsection
