<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FuncionarioController extends Controller
{
    
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
        }
        return view('auth.funcionario.index', compact('funcionarios'));
    }
    
   
    public function create()
    {
        return view('auth.funcionario.create');
    }

    
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'cargo' => 'required|string|max:255',
            'salario' => 'nullable|numeric',
            'chefe_id' => 'nullable|exists:chefes,id',
        ]);
    
        // Criação do usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    
        // Criação do funcionário associado ao usuário
        $funcionario = new Funcionario;
        $funcionario->salario = $request->salario;
        $funcionario->cargo = $request->cargo;
        $funcionario->chefe_id = $request->chefe_id;
        $funcionario->user_id = $user->id;
        $funcionario->save();
    
        return redirect()->route('home')->with('success', 'Funcionário criado com sucesso.');
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
