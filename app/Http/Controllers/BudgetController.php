<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Client;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function create($client_id)
    {
        $client = Client::findOrFail($client_id);
        return view('budgets.create', compact('client'));
    }
    public function index()
    {
        $budgets = Budget::all();

        return view('budgets.index', compact('budgets'));
    }
    public function indexClient()
    {

        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para acessar esta página.');
        }

        $client = $user->client;

        if (!$client) {
            return redirect()->route('clientdashboard.index')->with('error', 'Cliente não encontrado.');
        }

        $budgets = Budget::where('client_id', $client->id)->get();

        return view('clientbudget.index', compact('budgets'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'services' => 'required|array',
            'services.*.description' => 'required|string|max:255',
            'services.*.quantity' => 'required|integer|min:1',
            'services.*.cost' => 'required|numeric|min:0',
        ]);

        $totalCost = collect($validatedData['services'])->reduce(function ($carry, $item) {
            return $carry + ($item['quantity'] * $item['cost']);
        }, 0);

        $budget = Budget::create([
            'client_id' => $validatedData['client_id'],
            'services' => $validatedData['services'],
            'total_cost' => $totalCost,
            'status' => 'pendente',
        ]);

        return redirect()->route('budgets')->with('success', 'Orçamento cadastrado com sucesso!');
    }

    public function update(Request $request, $budget_id)
    {
        $budget = Budget::findOrFail($budget_id);

        if (auth()->user()->role !== 'client') {
            return redirect()->route('budgets')->withErrors('Apenas clientes podem atualizar orçamentos.');
        }

        $request->validate([
            'status' => 'required|in:aprovado,reprovado',
            'observations' => 'nullable|string|max:255',
        ]);

        $budget->status = $request->status;
        $budget->save();

        if ($request->status == 'aprovado') {
            ServiceOrder::create([
                'budget_id' => $budget->id,
                'start_date' => now(),
                'end_date' => now()->addDays(7),
                'status' => 'em andamento',
            ]);
        }

        if ($request->status == 'reprovado') {
            $budget->observations = $request->observations;
            $budget->save();
        }

        return redirect()->route('budgets.index')->with('success', 'Orçamento atualizado com sucesso!');
    }

    public function showClient($budget_id)
    {
        $budget = Budget::findOrFail($budget_id);

        if (auth()->user()->role !== 'client') {
            return redirect()->route('budgets')->withErrors('Somente clientes podem visualizar o orçamento.');
        }

        return view('clientbudget.index', compact('budget'));
    }

    public function showMechanic($budget_id)
    {
        $budget = Budget::findOrFail($budget_id);

        if (auth()->user()->role !== 'mechanic') {
            return redirect()->route('budgets.index')->withErrors('Somente mecânicos podem visualizar este orçamento.');
        }

        return view('budgets.show', compact('budget'));
    }

    public function clientBudgets($client_id)
    {
        $client = Client::findOrFail($client_id);

        $budgets = Budget::where('client_id', $client_id)->get();

        return view('budgets.clientbudget', compact('client', 'budgets'));
    }
}
