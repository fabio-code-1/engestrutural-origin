<?php

namespace App\Http\Controllers\Projeto;

use App\Models\Arquivo;
use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'valor_arquitetonico' => 'nullable|string',
            'valor_estrutural' => 'nullable|string',
            'valor_hidraulica' => 'nullable|string',
            'valor_eletrica' => 'nullable|string',
            'cliente_id' => 'required|exists:clientes,id', // Verifica se o cliente com esse ID existe
        ]);
    
        // Criação de um novo projeto com base nos dados do formulário
        Projeto::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'valor_arquitetonico' => $request->valor_arquitetonico,
            'valor_estrutural' => $request->valor_estrutural,
            'valor_hidraulica' => $request->valor_hidraulica,
            'valor_eletrica' => $request->valor_eletrica,
            'id_cliente' => $request->cliente_id,
        ]);
    
        // Redirecionamento após a criação do projeto
        return back()->with('success', 'Projeto criado com sucesso!');
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
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'valor_arquitetonico' => 'nullable|string',
            'valor_estrutural' => 'nullable|string',
            'valor_hidraulica' => 'nullable|string',
            'valor_eletrica' => 'nullable|string',
        ]);
    
        $projeto = Projeto::findOrFail($id);
    
        $projeto->status = $request->status;
        $projeto->nome = $request->nome;
        $projeto->descricao = $request->descricao;
        $projeto->valor_arquitetonico = $request->valor_arquitetonico;
        $projeto->valor_estrutural = $request->valor_estrutural;
        $projeto->valor_hidraulica = $request->valor_hidraulica;
        $projeto->valor_eletrica = $request->valor_eletrica;

        $projeto->save();
        return back()->with('success', 'Projeto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projeto = Projeto::findOrFail($id);
        $arquivos = Arquivo::where('id_projeto', $projeto->id)->get();
        
        foreach ($arquivos as $arquivo) {
            $caminhoArquivo = 'public/' . $arquivo->files;
            
             if (Storage::disk('local')->exists($caminhoArquivo)) {
                Storage::disk('local')->delete($caminhoArquivo);
            }
        }
        $projeto->delete();
    
        return redirect()->route('cliente.show', ['cliente' => $projeto->id_cliente])->with('success', 'Projeto e seus arquivos excluídos com sucesso!');
    }
}
