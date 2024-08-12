@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Pesquisa de item</h1>
    <h2>Digite um trecho de um item para pesquisar.</h2>
    <form action="{{ route('pesquisar-item') }}" method="post">
        @csrf
        <input type="text" name="trecho" id="trecho" required autofocus>
        <button type="submit">Pesquisar</button>
    </form>
</main>

@endsection