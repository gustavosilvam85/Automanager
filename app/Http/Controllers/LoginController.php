<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            $user = Auth::user();

            if ($user->role === 'mechanic') {
                return redirect()->route('client.index');
            } elseif ($user->role === 'client') {
                return redirect()->route('clientbudget.index');
            }

            return redirect()->route('home');
        }

        return response()->json([
            'status' => 'error',
            'message' => 'As credenciais fornecidas não são válidas.'
        ], 401);
    }
}
