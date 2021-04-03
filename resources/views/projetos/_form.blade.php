<div class="row">
    <div class="input-field col s12">
        <input id="nome" name="nome" type="text" class="validate" required maxlength="100"
            value="{{ old('name', optional($projeto ?? '')->nome) }}">
        <label for="nome">Nome</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s6">
        <input id="dt_inicio" name="dt_inicio" type="date" class="validate" required
            value="{{ old('dt_inicio', optional($projeto ?? '')->dt_inicio) }}">
        <label for="dt_inicio">Data de início</label>
    </div>
    <div class="input-field col s6">
        <input id="dt_fim" name="dt_fim" type="date" class="validate" required
            value="{{ old('dt_fim', optional($projeto ?? '')->dt_fim) }}">
        <label for="dt_fim">Data de fim</label>
    </div>
</div>
<div class="row">

    <div class="input-field col s6">
        <input id="valor" name="valor" type="number" class="validate" required step=any min=1 max="500000"
            value="{{ old('valor', optional($projeto ?? '')->valor) }}">
        <label for="valor">Valor</label>
    </div>

    <div class="input-field col s6">
        <select name="risco">
            <option value="baixo" @if (optional($projeto ?? '')->risco == 'baixo') selected @endif>baixo</option>
            <option value="médio" @if (optional($projeto ?? '')->risco == 'médio') selected @endif>médio</option>
            <option value="alto" @if (optional($projeto ?? '')->risco == 'alto') selected @endif>alto</option>
        </select>
        <label>Risco</label>
    </div>
</div>
<div class="row">    
    <div class="col s4">
        <button class="btn waves-effect waves-light orange darken-4" type="submit" name="action">
            @if (isset($projeto))
                Atualizar
            @else
                Salvar
            @endif  
        </button>
    
        <a class="btn waves-effect waves-light white black-text" href="{{route('projetos.index')}}">
            Cancelar
        </a>
    </div>
</div>
