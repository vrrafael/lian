@extends('base')

@section('content')
    <h2>Editar projeto</h2>
    <div class="row">
        <form action="{{ route('projetos.update', ['id' => $projeto->id]) }}" method="POST" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input id="nome" name="nome" type="text" class="validate" required maxlength="100" 
                    value="{{old('name', optional($projeto)->nome)}}">
                    <label for="nome">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="dt_inicio" name="dt_inicio" type="date" class="validate" required
                    value="{{old('dt_inicio', optional($projeto)->dt_inicio)}}">
                    <label for="dt_inicio">Data de início</label>
                </div>
                <div class="input-field col s6">
                    <input id="dt_fim" name="dt_fim" type="date" class="validate" required 
                    value="{{old('dt_fim', optional($projeto)->dt_fim)}}">
                    <label for="dt_fim">Data de fim</label>
                </div>
            </div>
            <div class="row">

                <div class="input-field col s6">
                    <input id="valor" name="valor" type="number" class="validate" required step=any min=1 max="500000"
                    value="{{old('valor', optional($projeto)->valor)}}">
                    <label for="valor">Valor</label>
                </div>

                <div class="input-field col s6">
                    <select name="risco">
                        <option value="0" @if (optional($projeto)->risco == '0')
                            selected
                        @endif>baixo</option>
                        <option value="1" @if (optional($projeto)->risco == '1')
                            selected
                        @endif>médio</option>
                        <option value="2" @if (optional($projeto)->risco == '2')
                            selected
                        @endif>alto</option>
                    </select>
                    <label>Risco</label>
                </div>
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light orange darken-4" type="submit" name="action">Atualizar                    
                </button>
            </div>
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$projeto->id}}">            
        </form>
    </div>
@endsection
