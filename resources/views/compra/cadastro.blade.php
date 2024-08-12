@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Cadastro de Compra</h1>
    <form action="{{ route('inserir-compra') }}" method="post">
        @csrf
        <input type="date" name="data" id="data" value="{{ $hoje }}" required />
        <input type="hidden" name="itens" id="itens" value="[]" />
        <button type="submit">Inserir</button>
    </form>
    <table>
        <thead>
            <tr>
                <th colspan="3">Selecione os itens abaixo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($itens as $item)
            <tr>
                <td>{{ $item->indice }}</td>
                <td>
                    <input type="checkbox" name="id" id="{{ $item->id }}" class="checkbox" onclick="clicar(event)">
                </td> 
                <td>{{ $item->nome }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>

<script>
    function inserir(id) {
        const itensElement = document.getElementById('itens')
        const itens = JSON.parse(itensElement.value);
        if (!itens.includes(id)) {
            itens.push(id);
        }
        itensElement.value = JSON.stringify(itens);
    }

    function excluir(id) {
        const itensElement = document.getElementById('itens')
        const itens = JSON.parse(itensElement.value);
        for (let i = 0; i < itens.length; i++) {
            if (itens[i] === id) {
                itens.splice(i, 1);
                break;
            }
        }
        itensElement.value = JSON.stringify(itens);
    }

    function clicar(event) {
        const id = event.target.id;
        if (event.target.checked) {
            inserir(id);
        } else {
            excluir(id);
        }
    }
</script>

@endsection