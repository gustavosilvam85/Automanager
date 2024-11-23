<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'cpf' => 'required|string|max:14|unique:clients,cpf',
            'email' => 'required|email|max:255|unique:clients,email',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:2',
            'zip_code' => 'required|string|max:10',
            'phone1' => 'required|string|max:15',
            'phone2' => 'nullable|string|max:15',
        ]);

        $token = Str::random(5);
        
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role = 'client';
        $user->password = bcrypt($token);
        $user->save();

        $client = Client::create([
            'name' => $validatedData['name'],
            'birth_date' => $validatedData['birth_date'],
            'cpf' => $validatedData['cpf'],
            'email' => $validatedData['email'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'state' => $validatedData['state'],
            'zip_code' => $validatedData['zip_code'],
            'phone1' => $validatedData['phone1'],
            'phone2' => $validatedData['phone2'] ?? null,
            'user_id' => $user->id,  
        ]);

        $token = Str::random(5);


        Mail::send('emails.client_token', ['name' => $client->name, 'token' => $token], function ($message) use ($client) {
            $message->to($client->email)->subject('Seu Token de Acesso');
        });

        return redirect()->route('car.create', ['client' => $client->id])->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function index()
    {
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }
}
