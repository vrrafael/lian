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
                            <td>
                                @switch($projeto->risco)
                                    @case(0)
                                    Baixo
                                    @break
                                    @case(1)
                                    Médio
                                    @break
                                    @case(2)
                                    Alto
                                    @break
                                    @default
                                    '---'
                                @endswitch
                            </td>
                            <td>
                                <a href="{{ route('projetos.edit', ['id' => $projeto->id]) }}" class="tooltipped"
                                    data-tooltip="Editar"><i class="material-icons">edit</i></a>
                                <a href="#" class="tooltipped" data-tooltip="Excluir"><i
                                        class="material-icons">delete</i></a>
                                <a class="tooltipped" href="#" data-tooltip="Simular investimento"
                                    onclick="open_modal({{ $projeto->id }}, {{ $projeto->valor }}, {{ $projeto->risco }})">
                                    <i class="material-icons">monetization_on</i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $projetos->links('vendor.pagination.default') }}

    @include('projetos._simular')

    <script>
        function open_modal(id, valor, risco) {
            document.getElementById('projeto_valor').value = valor
            document.getElementById('projeto_id').value = id
            document.getElementById('projeto_risco').value = risco

            M.Modal.getInstance(document.getElementById('modal1')).open()
            M.updateTextFields();
        }

    </script>

@endsection
