@extends('index')

@section('content')

@include('menu')

@if (count($itens) > 0)

<main>
    <h1>Faltam os Seguintes Ítens</h1>
    @if ($mensagem !== '')
    <div class="sucesso" id="sucesso">
        <p>{{ $mensagem }}</p>
        <button onclick="fecharMensagem()">X</button>
    </div>
    @endif
    <table>
        <tbody>
            @foreach ($itens as $item)
            <tr>
                <td>{{ $item->indice }}</td>
                <td>{{ $item->nome }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>

@else

<main>
    <h1>Não há itens faltando.</h1>
</main>

@endif

<script>
    function fecharMensagem() {
        document.getElementById('sucesso').innerHTML = '';
    }
</script>

@endsection