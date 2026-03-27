<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ScannerUserController extends Controller
{
    /**
     * Muestra el formulario para crear un nuevo usuario scanner.
     */
    public function showCreateForm()
    {
        return view('auth.create-scanner');
    }

    /**
     * Procesa el formulario y crea un nuevo usuario scanner.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'scanner',
        ]);

        return redirect()->route('participants.create')->with('success', 'Usuario scanner creado correctamente.');
    }
}
