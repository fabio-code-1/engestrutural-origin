<?php

namespace App\Http\Controllers\Pagamento;

use App\Models\Projeto;
use App\Models\Pagamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $projetos = Projeto::where('id_cliente', $id)->get();
        return view('pagamento.index', ['projetos' => $projetos, 'id_cliente' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valide os dados do formulário
        $request->validate([
            'forma_pagamento' => 'required',
            'projeto_id' => 'required',
            'pagamento' => 'required',
            'categoria_pagamento' => 'required', 
        ]);
        
    
        // Crie um novo pagamento com os dados do formulário
        $pagamento = new Pagamento([
            'forma_pagamento' => $request->get('forma_pagamento'),
            'projeto_id' => $request->get('projeto_id'),
            'pagamento' => $request->get('pagamento'),
            'categoria_pagamento' => $request->get('categoria_pagamento'),
        ]);
    
        // Salve o pagamento no banco de dados
        $pagamento->save();
    
        // Redirecione para alguma página após salvar o pagamento
        return back()->with('success', 'Pagamento adicionado com sucesso!');
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
        // Encontre o pagamento pelo ID
        $pagamento = Pagamento::find($id);
    
        // Verifique se o pagamento foi encontrado
        if (!$pagamento) {
            // Se não encontrado, redirecione com uma mensagem de erro
            return redirect()->back()->with('error', 'Pagamento não encontrado.');
        }
    
        // Exclua o pagamento
        $pagamento->delete();
    
        // Redirecione de volta com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Pagamento excluído com sucesso.');
    }
}
