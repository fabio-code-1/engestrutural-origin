<?php

namespace App\Http\Controllers\Cliente;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::orderBy('nome')->get();

        return view('cliente.index', compact('clientes')); 
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
            'cnpj' => 'nullable|string|max:20',
            'cpf' => 'nullable|string|max:14',
            'telefone' => 'nullable|string|max:15',
        ]);

        // Criação de um novo cliente
        $cliente = new Cliente();
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->cnpj = $request->cnpj;
        $cliente->cpf = $request->cpf;
        $cliente->telefone = $request->telefone;
        $cliente->save();

        // Retorno de uma resposta de sucesso
        return redirect()->route('cliente.index')->with('success', 'Cliente criado com sucesso!');
    }

    public function show($id)
    {
        // Recuperar o cliente
        $cliente = Cliente::findOrFail($id);
    
        // Recuperar todos os projetos do cliente
        $projetos = $cliente->projetos;
    
        return view('cliente.show', compact('cliente', 'projetos'));
    }
    
    
    

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'nome' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'cnpj' => 'nullable|string|max:20',
            'cpf' => 'nullable|string|max:14',
            'telefone' => 'nullable|string|max:20',
        ]);
    

        $cliente = Cliente::findOrFail($id);
    

        $cliente->nome = $request->input('nome');
        $cliente->email = $request->input('email');
        $cliente->cnpj = $request->input('cnpj');
        $cliente->cpf = $request->input('cpf');
        $cliente->telefone = $request->input('telefone');
    

        $cliente->save();
    

        return back()->with('success', 'Cliente atualizado com sucesso!');
    }


    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('cliente.index')->with('success', 'Cliente deletado com sucesso!');
    }
    
}
