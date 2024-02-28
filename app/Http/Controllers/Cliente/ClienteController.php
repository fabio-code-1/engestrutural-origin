<?php

namespace App\Http\Controllers\Cliente;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all(); // Recupera todos os clientes do banco de dados

        return view('cliente.index', compact('clientes')); // Passa os clientes para a view
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'rg' => 'nullable|string|max:20',
            'cpf' => 'nullable|string|max:14',
            'telefone' => 'nullable|string|max:15',
        ]);

        // Criação de um novo cliente
        $cliente = new Cliente();
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->rg = $request->rg;
        $cliente->cpf = $request->cpf;
        $cliente->telefone = $request->telefone;
        $cliente->save();

        // Retorno de uma resposta de sucesso
        return redirect()->route('cliente.index')->with('success', 'Cliente criado com sucesso!');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
