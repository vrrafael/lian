<div class="row">
    <div class="input-field col s12">
        <input id="nome" name="nome" type="text" class="validate" required maxlength="100"
            value="{{ old('nome', optional($projeto ?? '')->nome) }}">
        <label for="nome">Nome</label>
        @error('nome')
            <span class="helper-text red-text text-darken-4">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="input-field col s6">
        <input type="text" class="datepicker validate" id="dt_inicio" name="dt_inicio" required
            value="{{ old('dt_inicio', optional($projeto ?? '')->dt_inicio) }}">
        <label for="dt_inicio">Data de início</label>
        @error('dt_inicio')
            <span class="helper-text red-text text-darken-4">{{ $message }}</span>
        @enderror
    </div>
    <div class="input-field col s6">
        <input id="dt_fim" name="dt_fim" type="text" class="datepicker validate" required
            value="{{ old('dt_fim', optional($projeto ?? '')->dt_fim) }}">
        <label for="dt_fim">Data de fim</label>
        @error('dt_fim')
            <span class="helper-text red-text text-darken-4">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row">

    <div class="input-field col s6">
        <input id="valor" name="valor" type="number" class="validate" required step=any min=1 max="999999.99"
            value="{{ old('valor', optional($projeto ?? '')->valor) }}">
        <label for="valor">Valor</label>
        @error('valor')
            <span class="helper-text red-text text-darken-4">{{ $message }}</span>
        @enderror
    </div>

    <div class="input-field col s6">
        <select name="risco">
            <option value="baixo" @if (optional($projeto ?? '')->risco == 'baixo') selected @endif>baixo</option>
            <option value="médio" @if (optional($projeto ?? '')->risco == 'médio') selected @endif>médio</option>
            <option value="alto" @if (optional($projeto ?? '')->risco == 'alto') selected @endif>alto</option>
        </select>
        <label>Risco</label>
        @error('risco')
            <span class="helper-text red-text text-darken-4">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="inpt-field col s12">
        <div class="chips chips-autocomplete" id="p-autocomplete"></div>
        <input type="hidden" name="participantes" id="participantes" 
        value="{{ old('valor', optional($projeto ?? '')->participantes) }}">
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

        <a class="btn waves-effect waves-light white black-text" href="{{ route('projetos.index') }}">
            Cancelar
        </a>
    </div>
</div>

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            var elems = document.querySelectorAll('.chips');
            var chips = M.Chips.init(elems, {
                autocompleteOptions: {
                    data: null,
                    limit: 25, //Infinity,
                    minLength: 1
                },
                onChipAdd: () => {
                    aux = M.Chips.getInstance(document.getElementById('p-autocomplete')).chipsData
                    rs = ''

                    aux.forEach(element => {
                        rs += ''.concat(' ', element.tag)
                    });

                    document.getElementById('participantes').value = rs
                },
                onChipDelete: () => {
                    aux = M.Chips.getInstance(document.getElementById('p-autocomplete')).chipsData
                    rs = ''

                    aux.forEach(element => {
                        rs += ''.concat(' ', element.tag)
                    });

                    document.getElementById('participantes').value = rs
                }
            });            

            function get_users() {
                httpRequest = new XMLHttpRequest()

                httpRequest.onreadystatechange = () => {
                    if (httpRequest.readyState === XMLHttpRequest.DONE) {
                        resp = JSON.parse(JSON.stringify(httpRequest.response))
                        c = M.Chips.getInstance(document.getElementById('p-autocomplete'))
                        c.autocomplete.updateData(JSON.parse(resp))
                        
                        document.getElementById('participantes').value.split(' ').forEach((v, i) => {
                            c.addChip({ tag: v })
                        })
                    }
                }

                httpRequest.open('GET', '/api/participantes', false)
                httpRequest.send()
            }

            get_users()
        })

    </script>
@endpush
