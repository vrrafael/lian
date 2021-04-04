<?php

namespace App\Http\Controllers;

use \App\Models\Projeto;

class ProjetosController extends Controller
{

    public function index()
    {
        return view('projetos.index', ['projetos' => Projeto::paginate(15)]);
    }

    public function create()
    {
        return view('projetos.create');
    }

    public function store()
    {
        $dados = request()->only(['nome', 'risco', 'valor', 'dt_inicio', 'dt_fim']);
        
        $dados['dt_inicio'] = date_create_from_format('d/m/Y', $dados['dt_inicio'])->format('Y-m-d');
        $dados['dt_fim'] = date_create_from_format('d/m/Y', $dados['dt_fim'])->format('Y-m-d');

        $p = new Projeto($dados);

        if ($p->save()) {
            request()->session()->flash('sucesso', 'Projeto criado com sucesso');
            return redirect()->route('projetos.index');
        }

        request()->session()->flash('erro', 'Não foi possível salvar o projeto');
        return redirect()->back()->withInput();
    }

    public function edit($id)
    {
        $p = Projeto::findOrFail($id);
        
        $p->dt_inicio = date_create_from_format('Y-m-d', $p->dt_inicio)->format('d/m/Y');
        $p->dt_fim = date_create_from_format('Y-m-d', $p->dt_fim)->format('d/m/Y');

        return view('projetos.edit', ['projeto' => $p]);
    }

    public function update($id)
    {
        $dados = request()->only(['nome', 'risco', 'valor', 'dt_inicio', 'dt_fim']);
        $p = Projeto::findOrFail(request()->get('id'));
        
        $dados['dt_inicio'] = date_create_from_format('d/m/Y', $dados['dt_inicio'])->format('Y-m-d');
        $dados['dt_fim'] = date_create_from_format('d/m/Y', $dados['dt_fim'])->format('Y-m-d');

        $updated = $p->update($dados);

        if ($updated) {
            request()->session()->flash('sucesso', 'Projeto Atualizado');
            return redirect()->route('projetos.index');
        }

        request()->session()->flash('erro', 'Erro ao atualizar dados do projeto');
        return redirect()->back()->withInput();
    }

    public function simular()
    {
        $roi = 0;
        $dados = request()->all();
        
        switch($dados['risco'])
        {            
            case 'baixo':
                $roi += floatval($dados['invest']) * 0.05;
                break;
            case 'médio':
                $roi += floatval($dados['invest']) * 0.1;
                break;
            case 'alto':
                $roi += floatval($dados['invest']) * 0.20;
                break;
        }

        $dados = array_merge($dados, ['roi' => round($roi, 2)]);

        return response()->json($dados);
    }

    public function delete()
    {
        $p = Projeto::findOrFail(request('id'));
        $n = $p->nome;

        $p->delete();

        request()->session()->flash('sucesso', "Projeto {$n} excluido com sucesso");
        return redirect()->back();
    }

}
