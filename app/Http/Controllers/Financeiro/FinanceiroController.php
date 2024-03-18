<?php

namespace App\Http\Controllers\Financeiro;

use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinanceiroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mesAtual = date('m'); // obtém o número do mês atual
        $anoAtual = date('Y'); // obtém o ano atual
    
        $projetos = Projeto::whereMonth('created_at', $mesAtual)
                            ->whereYear('created_at', $anoAtual)
                            ->get();
    
        // Converte os dados para JSON
        $projetosJson = json_encode($projetos);
    
        return view('financeiro.index', ['projetosJson' => $projetosJson]);
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
        //
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
