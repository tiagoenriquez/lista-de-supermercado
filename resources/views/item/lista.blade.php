@extends('index')

@section ('content')

@include('menu')

<main>
    @if (count($itens) > 0)
    <h1>Itens com o trecho digitado</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($itens as $item)
            <tr>
                <td>{{ $item->nome }}</td>
                <td>
                    <form action="{{ route('editar-item', $item->id) }}" method="get">
                        <button type="submit" class="iconed-button">
                            <img src="{{ asset('img/caneta.png') }}" alt="Atualizar" class="icon" title="Atualizar Item" />
                        </button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('ameacar-item', $item->id) }}" method="get">
                        <button type="submit" class="iconed-button">
                            <img src="{{ asset('img/lixeira.png') }}" alt="Excluir" class="icon" title="Excluir Item" />
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h1>Não foi encontrada nenhum item com o trecho digitado.</h1>
    @endif
</main>

@endsection