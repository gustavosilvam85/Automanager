@extends('layouts.app')

@section('content')
<div>
    <h2>Orçamentos do Cliente</h2>

    @if($budgets->isEmpty())
        <p class="text-center">Nenhum orçamento disponível.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Valor Total</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($budgets as $budget)
                <tr>
                    <td>{{ $budget->id }}</td>
                    <td>{{ $budget->client->name }}</td>
                    <td>{{ number_format($budget->total_cost, 2, ',', '.') }}</td>
                    <td>{{ ucfirst($budget->status) }}</td>
                    <td>
                        <!-- Formulário de Aprovação/Reprovação -->
                        <form action="{{ route('budget.update', $budget->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="status-{{ $budget->id }}">Alterar Status:</label>
                                <select name="status" id="status-{{ $budget->id }}" class="form-control">
                                    <option value="aprovado" {{ $budget->status == 'aprovado' ? 'selected' : '' }}>Aprovar</option>
                                    <option value="reprovado" {{ $budget->status == 'reprovado' ? 'selected' : '' }}>Reprovar</option>
                                </select>
                            </div>
                            <!-- Observações -->
                            <div class="form-group mt-2" id="observations-container-{{ $budget->id }}" style="display: none;">
                                <label for="observations-{{ $budget->id }}">Observações:</label>
                                <textarea name="observations" id="observations-{{ $budget->id }}" class="form-control" maxlength="255" placeholder="Insira o motivo da reprovação"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Atualizar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<script>
    // Gerenciar exibição do campo Observações para múltiplos formulários
    document.querySelectorAll('[id^="status-"]').forEach(select => {
        select.addEventListener('change', function () {
            const id = this.id.split('-')[1];
            const observationsContainer = document.getElementById(`observations-container-${id}`);
            if (this.value === 'reprovado') {
                observationsContainer.style.display = 'block';
            } else {
                observationsContainer.style.display = 'none';
            }
        });
    });
</script>
@endsection
