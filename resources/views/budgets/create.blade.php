@extends('layouts.app')

@section('content')
<div>
    <div class="row justify-content-center align-items-center login" style="background-color: #9E0E15">
        <div class="card" style="width: 80%">
            <div class="card-body p-3">
                <h2>Criar Orçamento</h2>
                <form action="{{ route('budget.store') }}" method="POST">
                    @csrf

                    <!-- Campo oculto para o client_id -->
                    <input type="hidden" name="client_id" value="{{ $client->id }}">

                    <!-- Serviços -->
                    <div id="services-container" class="row">
                        <div class="col-md-4 service-item">
                            <div class="row">
                                <h4 class="col">Serviço 1</h4>
                            </div>
                            <div class="form-group">
                                <label for="services[0][description]" class="text-dark">Descrição</label>
                                <input type="text" name="services[0][description]" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="services[0][quantity]" class="text-dark">Quantidade</label>
                                <input type="number" name="services[0][quantity]" class="form-control" min="1" required>
                            </div>
                            <div class="form-group">
                                <label for="services[0][cost]" class="text-dark">Custo</label>
                                <input type="number" name="services[0][cost]" class="form-control" step="0.01" min="0" required>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="add-service" class="btn btn-secondary my-3">Adicionar Serviço</button>

                    <!-- Botão de enviar -->
                    <button type="submit" class="btn btn-dark">Criar Orçamento</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let serviceIndex = 1;

    // Função para adicionar um novo serviço
    document.getElementById('add-service').addEventListener('click', function () {
        const container = document.getElementById('services-container');
        const newService = document.createElement('div');
        newService.classList.add('col-md-4', 'service-item');
        newService.innerHTML = `
            <div class="row">
                <h4 class="col">Serviço ${serviceIndex + 1}</h4>
                <button type="button" class="btn btn-danger remove-service col-md-3">Remover</button>
            </div>
            <div class="form-group">
                <label for="services[${serviceIndex}][description]">Descrição</label>
                <input type="text" name="services[${serviceIndex}][description]" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="services[${serviceIndex}][quantity]">Quantidade</label>
                <input type="number" name="services[${serviceIndex}][quantity]" class="form-control" min="1" required>
            </div>
            <div class="form-group">
                <label for="services[${serviceIndex}][cost]">Custo</label>
                <input type="number" name="services[${serviceIndex}][cost]" class="form-control" step="0.01" min="0" required>
            </div>
        `;
        container.appendChild(newService);
        serviceIndex++;

        // Adicionando o evento de remoção para o novo serviço
        const removeButton = newService.querySelector('.remove-service');
        removeButton.addEventListener('click', function() {
            newService.remove();
        });
    });

    // Evento de remoção para o primeiro serviço
    const initialRemoveButton = document.querySelector('.remove-service');
    if (initialRemoveButton) {
        initialRemoveButton.addEventListener('click', function() {
            initialRemoveButton.closest('.service-item').remove();
        });
    }
</script>
@endsection
