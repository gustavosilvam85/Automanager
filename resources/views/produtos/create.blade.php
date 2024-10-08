@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Produto</h1>
    <form action="{{ route('produtos.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" class="form-control" id="preco" name="preco" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Produto</button>
    </form>
</div>
@endsection
