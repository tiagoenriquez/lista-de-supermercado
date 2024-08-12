@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Edição de item</h1>
    <form action="{{ route('atualizar-item', $item->id) }}" method="post">
        @method('put')
        @csrf
        <div class="campo-de-digitacao">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ $item->nome }}" required autofocus>
            <input type="hidden" name="falta" id="falta" value="{{ $item->falta }}">
        </div>
        <button type="submit">Atualizar</button>
    </form>
</main>

@endsection