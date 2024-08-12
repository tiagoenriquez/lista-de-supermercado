<style>
    :root {
        --azul: rgb(0, 0, 255);
        --azul-claro: rgb(128, 128, 255);
        --azul-escuro: rgb(0, 0, 128);
        --azul-muito-claro: rgb(191, 191, 255);
        --azul-muito-escuro: rgb(0, 0, 64);
        --azul-pouco-claro: rgb(64, 64, 255);
        --azul-pouco-escuro: rgb(0, 0, 191);
        --verde: rgb(0, 128, 0);
        --vermelho: rgb(255, 0, 0);
        --familia-da-fonte: serif;
        --margem-grande: 8px 8px 8px 8px;
        --margem-para-texto: 4px 8px 4px 8px;
        --tamanho-da-fonte: 16px;
    }

    a {
        text-decoration: none;
        color: white;
        font-family: var(--familia-da-fonte);
        font-size: var(--tamanho-da-fonte);
        margin: (var(--margem-grande));
        padding: var(--margem-para-texto);
    }

    a:hover {
        background-color: var(--azul-escuro);
    }

    a:active {
        background-color: var(--azul-pouco-escuro);
    }

    body{
        display: flex;
        flex-direction: column;
        margin: 0;
        min-height: 100vh;
        min-width: 100vw;
    }

    button {
        background-color: var(--azul-muito-escuro);
        color: white;
        cursor: pointer;
        font-family: var(--familia-da-fonte);
        font-size: var(--tamanho-da-fonte);
        margin: var(--margem-grande);
        padding: var(--margem-para-texto);
    }

    button:hover {
        background-color: var(--azul-escuro);
    }

    button:active {
        background-color: var(--azul-pouco-escuro);
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    h1 {
        font-family: var(--familia-da-fonte);
        font-size: calc(var(--tamanho-da-fonte) * 2);
        text-align: center;
    }

    h2 {
        font-family: var(--familia-da-fonte);
        font-size: calc(var(--tamanho-da-fonte) * 3 / 2);
        text-align: center;
    }

    header {
        height: 32px;
    }

    img {
        height: auto;
        width: 512px;
    }

    input, select {
        font-family: var(--familia-da-fonte);
        font-size: var(--tamanho-da-fonte);
        margin: var(--margem-grande);
        padding: var(--margem-para-texto);
        width: 256px;
    }

    label {
        font-family: var(--familia-da-fonte);
        font-size: var(--tamanho-da-fonte);
        margin: var(--margem-grande);
        text-align: right;
        width: 128px;
    }

    main {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: calc(100vh - 32px);
        min-width: 100vw;
    }

    nav {
        display: flex;
        flex-direction: row;
        align-items: center;
        background-color: var(--azul-muito-escuro);
        height: 100%;
    }

    option:hover {
        background-color: var(--azul-muito-escuro);
    }

    p {
        font-family: var(--familia-da-fonte);
        font-size: var(--tamanho-da-fonte);
        margin: var(--margem-grande);
        padding: var(--margem-para-texto);
        text-align: left;
    }

    table {
        margin: var(--margem-grande);
    }

    tbody tr {
        font-family: var(--familia-da-fonte);
        font-size: var(--tamanho-da-fonte);
    }

    tbody tr:hover {
        background-color: var(--azul-muito-claro);
    }

    textarea {
        font-family: var(--familia-da-fonte);
        font-size: var(--tamanho-da-fonte);
        margin: var(--margem-grande);
        padding: var(--margem-para-texto);
    }

    thead tr {
        background-color: var(--azul-claro);
        font-family: var(--familia-da-fonte);
        font-size: var(--tamanho-da-fonte);
        font-weight: bold;
        height: 32px;
        text-align: center;
        text-transform: uppercase;
    }

    th, td {
        padding: var(--margem-para-texto);
    }

    .buttons {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;

    }

    .campo-de-digitacao {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
    }

    .checkbox {
        height: 32px;
        width: 32px;
    }

    .checkbox:checked {
        background-color: var(--azul);
    }

    .erro {
        background-color: var(--vermelho);
        color: white;
        width: 512px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
    }

    .icon {
        height: 32px;
        width: auto;
    }

    .iconed-button {
        height: 48px;
    }

    .menu-item {
        cursor: pointer;
    }

    .sucesso {
        background-color: var(--verde);
        color: white;
        width: 512px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
    }
</style>