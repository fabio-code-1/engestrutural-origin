<?php

namespace App\Http\Controllers\Arquivo;

use App\Models\Arquivo;
use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArquivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $projeto = Projeto::findOrFail($id);
        $arquivos = Arquivo::where('id_projeto', $projeto->id)->get();
     
        $chefe = auth()->user()->chefe;
        if ($chefe) {
            $cargo = $chefe->cargo;
        } else {
            $funcionario = auth()->user()->funcionario;
            $cargo = $funcionario->cargo;
        }
        
        return view('arquivo.index', compact('projeto', 'arquivos', 'cargo'));
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
        // Aumentar o limite de tamanho de postagem
        ini_set('post_max_size', '200M');
        ini_set('upload_max_filesize', '200M');

        // Validar os dados do formulário
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'id_projeto' => 'required|exists:projetos,id',
            'id_user' => 'required|exists:users,id',
            'categoria' => 'required|string'
        ]);

        // Obter o arquivo enviado do formulário
        $arquivo = $request->file('files');

        // Verificar se o arquivo foi enviado
        if ($arquivo->isValid()) {
            // Obter a extensão original do arquivo
            $extensao = $arquivo->getClientOriginalExtension();

            // Gerar um nome único para o arquivo
            $nomeArquivo = uniqid() . '.' . $extensao;

            // Salvar o arquivo no diretório de armazenamento com o nome único
            $caminhoArquivo = $arquivo->storeAs('arquivos', $nomeArquivo, 'public');

            // Criar uma nova instância de Arquivo com os dados do formulário
            $novoArquivo = new Arquivo([
                'nome' => $validatedData['nome'],
                'descricao' => $validatedData['descricao'],
                'files' => $caminhoArquivo,
                'id_projeto' => $validatedData['id_projeto'],
                'id_user' => $validatedData['id_user'], 
                'categoria' => $validatedData['categoria'], 
            ]);

            // Salvar o arquivo no banco de dados
            $novoArquivo->save();

            return back()->with('success', 'Arquivo criado com sucesso!');
        } else {
            return back()->with('error', 'O arquivo não é válido.');
        }
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
    public function destroy(Arquivo $arquivo)
    {
        // Verifique se o arquivo foi encontrado
        if ($arquivo) {
            // Obtenha o caminho do arquivo e mantenha o prefixo 'public/'
            $caminhoArquivo = 'public/' . $arquivo->files;
    
            // Verifique se o arquivo existe no sistema de arquivos
            if (Storage::disk('local')->exists($caminhoArquivo)) {
                // Exclua o arquivo do sistema de arquivos
                Storage::disk('local')->delete($caminhoArquivo);
            } else {
                // Se o arquivo não existir, retorne uma mensagem de erro
                return back()->with('error', 'O arquivo não existe no sistema de arquivos.');
            }
    
            // Exclua o registro do arquivo do banco de dados
            $arquivo->delete();
    
            return back()->with('success', 'Arquivo excluído com sucesso.');
        } else {
            // Se o arquivo não for encontrado, retorne uma mensagem de erro
            return back()->with('error', 'Arquivo não encontrado.');
        }
    }
    
    
}
