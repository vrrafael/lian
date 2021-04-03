@extends('base')

@section('content')
    <h2>Novo projeto</h2>
    <div class="row">
        <form action="{{ route('projetos.store')}}" method="POST" class="col s12">
            @include('projetos._form')
            @csrf
            @method('POST')                   
        </form>
    </div>
@endsection