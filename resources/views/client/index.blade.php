@extends('layouts.app')  <!-- Assumindo que seu layout base é o app.blade.php -->

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
                <h2 class="text-light">Clientes</h2>

                <a href="{{ route('client.create') }}" class="btn btn-dark">
                    Novo cliente
                </a>
            </div>

            @foreach($clients as $client)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $client->name }}</h5>
                        <p><strong>Telefone:</strong> {{ $client->phone1 }}</p>
                        <p><strong>Email:</strong> {{ $client->email }}</p>

                        <button class="btn btn-dark" data-toggle="modal" data-target="#clientModal{{ $client->id }}">
                            Ver mais
                        </button>

                        <a href="{{ route('budget.create', ['client_id' => $client->id]) }}" class="btn btn-dark">
                            Criar Orçamento
                        </a>

                        <div class="modal fade" id="clientModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="clientModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="clientModalLabel">Detalhes do Cliente</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Nome:</strong> {{ $client->name }}</p>
                                        <p><strong>Email:</strong> {{ $client->email }}</p>
                                        <p><strong>Telefone:</strong> {{ $client->phone1 }}</p>
                                        <p><strong>Endereço:</strong> {{ $client->address }}, {{ $client->city }} - {{ $client->state }}</p>

                                        <h5>Carros Cadastrados:</h5>
                                        <ul>
                                            @foreach($client->cars as $car)
                                                <li>
                                                    {{ $car->brand }} {{ $car->model }} - Placa: {{ $car->plate }} 
                                                    <button class="btn btn-sm btn-dark" data-toggle="modal" data-target="#carModal{{ $car->id }}">
                                                        Ver mais
                                                    </button>

                                                    <div class="modal fade" id="carModal{{ $car->id }}" tabindex="-1" role="dialog" aria-labelledby="carModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="carModalLabel">Detalhes do Carro</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><strong>Marca:</strong> {{ $car->brand }}</p>
                                                                    <p><strong>Modelo:</strong> {{ $car->model }}</p>
                                                                    <p><strong>Placa:</strong> {{ $car->plate }}</p>
                                                                    <p><strong>Ano de fabricação:</strong> {{ $car->manufacture_year}}</p>
                                                                    <p><strong>Ano do modelo:</strong> {{ $car->model_year}}</p>
                                                                    <p><strong>Cor:</strong> {{ $car->color }}</p>
                                                                    <p><strong>Tipo de Combustível:</strong> {{ $car->fuel_type }}</p>
                                                                    <p><strong>Observações:</strong> {{ $car->remarks }}</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
