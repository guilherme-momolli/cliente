<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::with('user')->get();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        $users = User::doesntHave('cliente')->get();
        return view('clientes.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:clientes,cpf',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string|max:255',
            'user_id' => 'required|exists:users,id|unique:clientes,user_id',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!');
    }

    public function show(Cliente $cliente){
    return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        $users = User::doesntHave('cliente')->orWhere('id', $cliente->user_id)->get();
        return view('clientes.edit', compact('cliente', 'users'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:clientes,cpf,' . $cliente->id,
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string|max:255',
            'user_id' => 'required|exists:users,id|unique:clientes,user_id,' . $cliente->id,
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
    }

}
