@extends('app')

@section('content')
<div class="row">
    <!-- Sidebar -->
    <div class="col-md-3 col-lg-2">
        @include('components.sidebar')
    </div>

    <!-- Main Content -->
    <main class="col-md-9 col-lg-10">
        <h1 class="my-4">Serviços em Aberto</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->client->name }}</td>
                        <td>{{ $service->description }}</td>
                        <td>{{ $service->status }}</td>
                        <td>
                            <a href="{{ route('services.show', $service->id) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Nenhum serviço em aberto.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
</div>
@endsection
