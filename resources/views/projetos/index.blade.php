@extends('base')

@section('content')
    <h2>Projetos</h2>

    <div class="row">
        <div class="col s12">
            <table class="striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projetos as $projeto)
                        <tr>
                            <td>{{ $projeto->nome }}</td>
                            <td>R$ {{ number_format($projeto->valor, 2, ',', '.') }}</td>
                            <td>
                                <a href="{{route("projetos.edit", ['id' => $projeto->id])}}" class="tooltipped" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                                <a href="#" class="tooltipped" data-tooltip="Excluir"><i class="material-icons">delete</i></a>
                                <a href="#" class="tooltipped" data-tooltip="Ver +"><i class="material-icons">more_horiz</i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $projetos->links('vendor.pagination.default') }}
@endsection
