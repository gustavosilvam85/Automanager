@extends('layouts.app')

@section('content')
<div class="row login" style="background-color: #9E0E15">
    <div class="col-md-3">
        @include('components.sidebar')
    </div>
    
    <div class="col-md-8">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="d-flex justify-content-between align-items-center pt-5">
        <h2 class="text-light py-5">Orçamentos</h2> <!-- Isso vai se alinhar à esquerda -->
    </div>

    <table class="table">
        <thead>
            <tr>
                <th class="text-light">Cliente</th>
                <th class="text-light">Status</th>
                <th class="text-light">Total</th>
                <th class="text-light">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($budgets as $budget)
                <tr>
                    <td class="text-light" hidden>{{ $budget->id }}</td>
                    <td class="text-light">{{ $budget->client->name }}</td>
                    <td class="text-light">{{ $budget->status }}</td>
                    <td class="text-light">R$ {{ number_format($budget->total_cost, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('budget.show', $budget->id) }}" class="btn btn-secondary">Ver Mais</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection