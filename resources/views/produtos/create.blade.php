@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow" style="width: 100%; max-width: 500px;">
        <div class="card-body">
            <h1 class="text-center mb-4">Criar Produto</h1>
            <form action="{{ route('produtos.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Preço</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="buttonCreate">Criar Produto</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
