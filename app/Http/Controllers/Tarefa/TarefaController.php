<?php

namespace App\Http\Controllers\Tarefa;

use App\Models\Tarefa;
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
            if ($chefe->cargo === 'engenheiro') {
                $cargos = ['engenheiro', 'elétrica', 'hidráulica'];
            } else if ($chefe->cargo === 'arquiteto') {
                $cargos = ['arquiteto'];
            }
    
            $funcionarios = Funcionario::whereIn('cargo', $cargos)->get();
            $tarefas = Tarefa::where('chefe_id', $chefe->id)->get();
            return view('tarefa.index', compact('funcionarios', 'tarefas'));
        } else {
            $funcionario = auth()->user()->funcionario;
            $tarefas = Tarefa::where('funcionario_id', $funcionario->id)->get();
            return view('tarefa.index', compact('tarefas'));
        }
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
        // Validar os dados do formulário
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'prazo' => 'required|date',
            'prioridade' => 'required|in:baixa,media,alta',
            'status' => 'required|in:executar,executando,pendente,finalizado,correcao',
            'funcionario' => 'required|exists:funcionarios,id', // Verifica se o ID do funcionário existe na tabela funcionarios
        ]);
    
        // Criar a nova tarefa
        $tarefa = new Tarefa();
        $tarefa->titulo = $validatedData['titulo'];
        $tarefa->descricao = $validatedData['descricao'];
        $tarefa->prazo = $validatedData['prazo'];
        $tarefa->prioridade = $validatedData['prioridade'];
        $tarefa->status = $validatedData['status'];
        $tarefa->funcionario_id = $validatedData['funcionario']; // Associa a tarefa ao funcionário selecionado
        $tarefa->chefe_id = auth()->user()->chefe->id; // Associa a tarefa ao chefe logado
        $tarefa->save();
    
        $request->session()->put('active_tab_tarefa', $request->status);
        // Redirecionar de volta com uma mensagem de sucesso
        return redirect()->route('tarefa.index')->with('success', 'Tarefa criada com sucesso.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {

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
    public function update(Request $request)
    {
        // Validar os dados recebidos do formulário
        $request->validate([
            'idTarefa' => 'required|exists:tarefas,id',
            'funcionario' => 'required|exists:funcionarios,id',
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'prazo' => 'required|date',
            'prioridade' => 'required|in:baixa,media,alta',
            'status' => 'required|in:executar,executando,pendente,finalizado,correcao',
        ]);
    
        try {
            // Encontrar a tarefa pelo ID
            $tarefa = Tarefa::findOrFail($request->idTarefa);
    
            // Atualizar os dados da tarefa
            $tarefa->funcionario_id = $request->funcionario;
            $tarefa->titulo = $request->titulo;
            $tarefa->descricao = $request->descricao;
            $tarefa->prazo = $request->prazo;
            $tarefa->prioridade = $request->prioridade;
            $tarefa->status = $request->status;
    
            // Salvar as alterações no banco de dados
            $tarefa->save();
    
            // Redirecionar de volta com uma mensagem de sucesso
            return redirect()->back()->with('success', 'Tarefa atualizada com sucesso.');
        } catch (\Exception $e) {
            // Se ocorrer algum erro, redirecionar de volta com uma mensagem de erro
            return redirect()->back()->with('error', 'Erro ao atualizar a tarefa: ' . $e->getMessage());
        }
    }
    
    
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->route('tarefa.index')->with('success', 'Tarefa deletada com sucesso.');
    }


    public function selecionarAba($aba)
    {
        session()->put('active_tab_tarefa', $aba);
        return redirect()->route('tarefa.index');
    }

    public function updateStatus(Request $request, Tarefa $tarefa)
    {
        $request->validate([
            'status' => 'required|in:executar,executando,pendente,finalizado,correcao',
        ]);
    
        $tarefa->status = $request->status;
        $tarefa->save();
    
        $request->session()->put('active_tab_tarefa', $request->status);
    
        return redirect()->back()->with('success', 'Status da tarefa atualizado com sucesso.');
    }

}
