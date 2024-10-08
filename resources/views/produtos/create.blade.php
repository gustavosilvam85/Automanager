@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Produto</h1>
    <form action="{{ route('produtos.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="label">Descrição</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="mb-3">
            <label for="price" class="label">Preço</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Produto</button>
    </form>
</div>
@endsection
