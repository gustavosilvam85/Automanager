<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Client;

class CarController extends Controller
{
    public function create(Client $client)
    {
        return view('car.create',compact('client'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'manufacture_year' => 'required|integer|min:1900|max:' . date('Y'),
            'model_year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'plate' => 'required|string|max:10|unique:cars,plate',
            'color' => 'required|string|max:50',
            'fuel_type' => 'required|string|max:50',
            'notes' => 'nullable|string|max:500',
            'client_id' => 'required|exists:clients,id'
        ]);

        $car = Car::create([
            'brand'  => $validatedData['brand'],
            'model'=> $validatedData['model'],
            'manufacture_year'=> $validatedData['manufacture_year'],
            'model_year'=> $validatedData['model_year'],
            'plate'=> $validatedData['plate'],
            'color'=> $validatedData['color'],
            'fuel_type'=> $validatedData['fuel_type'],
            'notes'=> $validatedData['notes'],
            'client_id' => $validatedData['client_id'],
        ]);

        return redirect()->route('client.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

}
