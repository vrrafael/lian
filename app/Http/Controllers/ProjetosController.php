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
        $data = request()->only(['nome', 'risco', 'valor', 'dt_inicio', 'dt_fim']);
        $p = new Projeto($data);

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
        return view('projetos.edit', ['projeto' => $p]);
    }

    public function update($id)
    {
        $p = Projeto::findOrFail(request()->get('id'));
        $updated = $p->update(request()->only(['nome', 'risco', 'valor', 'dt_inicio', 'dt_fim']));

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
            case '0':
                $roi += floatval($dados['invest']) * 0.05;
                break;
            case '1':
                $roi += floatval($dados['invest']) * 0.1;
                break;
            case '2':
                $roi += floatval($dados['invest']) * 0.20;
                break;
        }

        $dados = array_merge($dados, ['roi' => $roi]);

        return response()->json($dados);
    }

}
