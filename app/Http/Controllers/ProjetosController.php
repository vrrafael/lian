<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Projeto;

class ProjetosController extends Controller
{
    
    public function index()
    {
        return view('projetos.index', ['projetos' => Projeto::paginate(15)]);
    }

}
