@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Compras cadastradas</h1>
    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compras as $compra)
            <tr>
                <td>{{ $compra['data'] }}</td>
                <td>
                    <form action="{{ route('itens-de-compra', $compra['id']) }}" method="get">
                        <button type="submit">Itens</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>

@endsection