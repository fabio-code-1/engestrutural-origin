<?php

namespace App\Http\Controllers\Financeiro;

use App\Models\Cliente;
use App\Models\Projeto;
use App\Models\Financeiro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinanceiroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::with('projetos')->get();
        
        return view('financeiro.index', ['clientes' => $clie]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::with('projetos')->get();
        
        return view('financeiro.create', ['clientes' => $clientes,]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'cliente' => 'required|string|max:255',
            'projeto' => 'required|string|max:255',
            'categoria_pagamento' => 'nullable|string|max:255',
            'forma_pagamento' => 'required|string|in:debito,credito,boleto,pix',
            'pagamento' => 'required|string|max:255',
            'data_pagamento' => 'required|date',
            'parcela' => 'nullable|string|max:255',
        ]);
    
        // Criação de um novo registro Financeiro 
        $financeiro = new Financeiro();
        $financeiro->cliente = $request->cliente;
        $financeiro->projeto = $request->projeto;
        $financeiro->categoria_pagamento = $request->categoria_pagamento;
        $financeiro->forma_pagamento = $request->forma_pagamento;
        $financeiro->pagamento = $request->pagamento;
        $financeiro->data_pagamento = $request->data_pagamento;
        $financeiro->parcela = $request->parcela;
        $financeiro->save();
    
        // Redirecionamento ou resposta de sucesso
        return redirect()->route('financeiro.index')->with('success', 'Pagamento criado com sucesso!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
