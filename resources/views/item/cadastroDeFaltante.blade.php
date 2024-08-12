@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Cadastro de Item Faltante</h1>
    <div id="erro"></div>
    <form action="{{ route('inserir-item-faltante') }}" method="post">
        @csrf
        @if (count($naoFaltantes) > 0)
        <div class="campo-de-digitacao">
            <label for="id">Selecione um item</label>
            <select name="id" id="id" onchange="escreverSelecionado()" autofocus>
                <option value="0"></option>
                @foreach ($naoFaltantes as $item)
                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                @endforeach
            </select>
        </div>
        @endif
        <input type="hidden" id="faltantes" value="{{ json_encode($faltantes) }}">
        <div class="campo-de-digitacao">
            <label for="nome">Digite um item não cadastrado</label>
            <input type="text" name="nome" id="nome" onkeyup="digitar()" required>
        </div>
        <button type="submit">Cadastrar</button>
    </form>
</main>

<script>
    function escreverSelecionado() {
        const select = document.getElementById('id');
        const option = select.children[select.selectedIndex];
        document.getElementById('nome').value = option.textContent;
    }

    function selecionarDigitado(item) {
        const options = document.getElementsByTagName('option');
        for (let i = 0; i < options.length; i++) {
            if (options[i] === item) {
                options[i].selected = true;
                break;
            }
        }
    }

    function fecharErroElement() {
        document.getElementById('erro').innerHTML = '';
    }

    function adicionarErroElement(text) {
        const erroElement = document.createElement('div');
        erroElement.className = 'erro';
        pErroElement = document.createElement('p');
        pErroElement.textContent = text;
        erroElement.appendChild(pErroElement);
        buttonErroElement = document.createElement('button');
        buttonErroElement.addEventListener('click', fecharErroElement);
        buttonErroElement.textContent = 'X';
        erroElement.appendChild(buttonErroElement);
        document.getElementById('erro').appendChild(erroElement);
    }

    function conferirFaltante(item) {
        const faltantes = JSON.parse(document.getElementById('faltantes').value);
        for (let i = 0; i < faltantes.length; i++) {
            if (faltantes[i].nome === item) {
                const inicialDeItem = item.charAt(0);
                const itemComMaiuscula = `${inicialDeItem.toUpperCase()}${item.substring(1)}`;
                adicionarErroElement(`${itemComMaiuscula} já existe e está faltando.`);
                break;
            }
        }        
    }

    function digitar() {
        const item = document.getElementById('nome').value;
        selecionarDigitado(item);
        conferirFaltante(item);
    }
</script>

@endsection