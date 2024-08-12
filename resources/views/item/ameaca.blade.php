@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Tem certeza de que deseja excluir {{ $item->nome }}?</h1>
    <div class="buttons">
        <form action="{{ route('itens-faltantes') }}" method="get">
            <button type="submit">Não</button>
        </form>
        <form action="{{ route('excluir-item', $item->id) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit">Sim</button>
        </form>
    </div>
</main>

@endsection