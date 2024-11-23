<?php

namespace App\Http\Controllers;

use App\Models\MechanicalWorkshop;
use App\Models\User;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function create()
    {
        return view('workshops.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'cnpj' => 'required|string|max:14|unique:mechanical_workshops,cnpj',
            'corporate_name' => 'required|string|max:255',
            'owner' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:2',
            'zip_code' => 'required|string|max:10',
            'phone1' => 'required|string|max:15',
            'phone2' => 'nullable|string|max:15',
            'email' => 'required|email|unique:mechanical_workshops,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = new User();
        $user->name = $validatedData['owner']; 
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->role = 'mechanic';
        $user->save();

        $workshop = MechanicalWorkshop::create($validatedData);

        return redirect()->route('login')->with('success', 'Oficina cadastrada com sucesso!');
    }

    public function show($id)
    {
        $workshop = MechanicalWorkshop::find($id);

        if (!$workshop) {
            return redirect()->route('workshops.index')->with('error', 'Oficina não encontrada');
        }

        return view('workshops.show', compact('workshop'));
    }
}
