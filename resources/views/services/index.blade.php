@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalhes do Orçamento</h2>
    <div class="row">
        <div class="col-md-9">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Custo Total</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $budget->id }}</td>
                        <td>{{ $budget->client->name }}</td>
                        <td>{{ number_format($budget->total_cost, 2, ',', '.') }}</td>
                        <td>{{ $budget->status }}</td>
                        <td>
                            <a href="{{ route('budget.show', $budget->id) }}" class="btn btn-info">Visualizar</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Formulário para Aprovação/Reprovação -->
            <form action="{{ route('budget.update', $budget->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="aprovado" {{ $budget->status == 'aprovado' ? 'selected' : '' }}>Aprovar</option>
                        <option value="reprovado" {{ $budget->status == 'reprovado' ? 'selected' : '' }}>Reprovar</option>
                    </select>
                </div>

                <div class="form-group" id="observations-container" style="display: none;">
                    <label for="observations">Observações</label>
                    <textarea name="observations" id="observations" class="form-control" placeholder="Informe o que deseja mudar..." maxlength="255"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('status').addEventListener('change', function () {
        if (this.value === 'reprovado') {
            document.getElementById('observations-container').style.display = 'block';
        } else {
            document.getElementById('observations-container').style.display = 'none';
        }
    });
</script>

@endsection
