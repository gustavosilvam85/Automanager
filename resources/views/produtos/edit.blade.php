@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">Editar Produto</h1>
    <form action="{{ route('produtos.update', $produto->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $produto->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $produto->description }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Preço</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $produto->price }}" required>
        </div>
        <button type="submit" class="btn btn-success buttonSave">Salvar Alterações</button>
    </form>
</div>
@endsection
