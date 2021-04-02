@extends('base')

@section('title', 'Login')

@section('content')
    <form action="{{ route('authenticate') }}" method="POST" class="col s8 offset-s2">
        <div class="row">
            <div class="input-field col s12">
                <input name="email" id="email" type="email" class="validate">
                <label for="email">E-mail</label>
            </div>
            <div class="input-field col s12">
                <input id="password" type="password" name="password">
                <label for="password">Senha</label>
            </div>
        </div>
        <div class="row"><button class="btn waves-effect waves-light orange darken-4" type="submit" name="action">Login</button></div>
        @csrf
    </form>
@endsection