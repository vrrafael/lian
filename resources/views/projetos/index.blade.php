@extends('base')

@section('content')
    <h2>Projetos</h2>
    <div class="row">
        <a href="{{ route('projetos.create') }}" class="btn orange darken-4">Novo projeto</a>
    </div>
    <div class="row">
        <div class="col s12">
            <table class="striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Risco</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projetos as $projeto)
                        <tr>
                            <td>{{ $projeto->nome }}</td>
                            <td>R$ {{ number_format($projeto->valor, 2, ',', '.') }}</td>
                            <td>{{ $projeto->risco }}</td>
                            <td>
                                <a href="{{ route('projetos.edit', ['id' => $projeto->id]) }}" class="tooltipped"
                                    data-tooltip="Editar"><i class="material-icons">edit</i></a>
                                <a href="#" class="tooltipped" data-tooltip="Excluir"
                                    onclick="excluir({{ $projeto->id }}, '{{ $projeto->nome }}')"><i
                                        class="material-icons">delete</i></a>
                                <a class="tooltipped" href="#" data-tooltip="Simular investimento"
                                    onclick="open_modal({{ $projeto->id }}, {{ $projeto->valor }}, '{{ $projeto->risco }}')">
                                    <i class="material-icons">monetization_on</i></a>
                            </td>
                        </tr>
                        <form action="{{ route('projetos.delete') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $projeto->id }}">
                            <input type="submit" name="btn_excluir_{{ $projeto->id }}" id="btn_excluir_{{ $projeto->id }}"
                             style="display: none">
                        </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $projetos->links('vendor.pagination.default') }}

    @include('projetos._simular')

    <script>
        function excluir(id, nome) {
            rs = confirm('Confirma excluir o projeto ' + nome + ' ?')

            if (rs) {
                btn = document.getElementById('btn_excluir_' + id)
                clicked = btn.dispatchEvent(new MouseEvent('click'))                
            }

        }

        function open_modal(id, valor, risco) {
            document.getElementById('projeto_valor').value = valor
            document.getElementById('projeto_id').value = id
            document.getElementById('projeto_risco').value = risco

            M.Modal.getInstance(document.getElementById('modal1')).open()
            M.updateTextFields();
        }

    </script>

@endsection
