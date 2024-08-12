@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Itens da Compra Realizada em {{ $compra['data'] }}</h1>
    <table>
        <thead>
            <tr>
                <th>Índice</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compra->itens() as $item)
            <tr>
                <td>{{ $item->indice }}</td>
                <td>{{ $item->nome }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>

@endsection