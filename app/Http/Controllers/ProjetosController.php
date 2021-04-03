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

}
