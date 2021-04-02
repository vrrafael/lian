<?php

namespace App\Http\Controllers;

use \App\Models\Projeto;
use SebastianBergmann\CodeUnit\FunctionUnit;

class ProjetosController extends Controller
{

    public function index()
    {
        return view('projetos.index', ['projetos' => Projeto::paginate(15)]);
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

        if($updated)
        {
            request()->session()->flash('sucesso', 'Projeto Atualizado');
            return redirect()->route('projetos.index');            
        }

        request()->session()->flash('erro', 'Erro ao atualizar dados do projeto');
        return redirect()->back()->withInput();
    }

}
