@extends('layouts.app')

@section('content')
<div class="row login" style="background-color: #9E0E15">

    <div class="col-md-3">
        @include('components.sidebar')
    </div>

    
    <div class="px-5">
        <h2 class="text-light py-5 ">Detalhes do Orçamento</h2>
        <div>
            <h4 class="text-light">Cliente: {{ $budget->client->name }}</h4>
            <p class="text-light"><strong>Status:</strong> {{ ucfirst($budget->status) }}</p>
            <p class="text-light"><strong>Total:</strong> R$ {{ number_format($budget->total_cost, 2, ',', '.') }}</p>
            
            <h5 class="mt-4 text-light">Serviços</h5>
            <ul>
                @foreach($budget->services as $service)
                    <li class="text-light">{{ $service['description'] }} - Quantidade: {{ $service['quantity'] }} - Custo Unitário: R$ {{ number_format($service['cost'], 2, ',', '.') }}</li>
                @endforeach
            </ul>

            <a href="{{ route('budget.index') }}" class="btn btn-secondary mt-4">Voltar</a>
        </div>
    </div>
</div>
@endsection
