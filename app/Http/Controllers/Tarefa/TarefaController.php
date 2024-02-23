<?php

namespace App\Http\Controllers\Tarefa;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chefe = auth()->user()->chefe;
        if ($chefe) {
            $cargos = [$chefe->cargo];
            // Se o cargo do chefe for "engenheiro", adiciona os cargos adicionais
            if ($chefe->cargo === 'engenheiro') {
                $cargos = ['engenheiro', 'elétrica', 'hidráulica'];
            }else if ($chefe->cargo === 'arquiteto') {
                $cargos = ['arquiteto'];
            }

            $funcionarios = Funcionario::whereIn('cargo', $cargos)->get();
            return view('tarefa.index', compact('funcionarios'));
        }

        return view('tarefa.index');
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
