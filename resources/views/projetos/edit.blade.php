@extends('base')

@section('content')
    <h2>Editar projeto</h2>
    <div class="row">
        <form action="{{ route('projetos.update', ['id' => $projeto->id]) }}" method="POST" class="col s12">
            @include('projetos._form')
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$projeto->id}}">            
        </form>
    </div>
@endsection
