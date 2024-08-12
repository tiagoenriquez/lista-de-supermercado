<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function ameacar(int $id): View
    {
        try {
            return view('item.ameaca', ['item' => Item::findOrFail($id)]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function atualizar(Request $request, int $id): View
    {
        try {
            $item = Item::findOrFail($id);
            $nomeAntigo = $item->nome;
            $item->update($request->all());
            return $this->listarFaltantes('O item ' . $nomeAntigo . ' foi atualizado para ' . $item->nome . ' com sucesso.');
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function cadastrarFaltante(): View
    {
        try {
            return view('item.cadastroDeFaltante', [
                'faltantes' => Item::faltantes(),
                'naoFaltantes' => Item::naoFaltantes()
            ]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function comprar(array $ids): View
    {
        try {
            Item::comprar($ids);
            return $this->listarFaltantes('Compra efetuada com sucesso');
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function digitarTrecho(): View
    {
        return view('item.pesquisa');
    }

    public function editar(int $id): View
    {
        try {
            return view('item.edicao', ['item' => Item::findOrFail($id)]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function excluir(int $id): View
    {
        try {
            $item = Item::findOrFail($id);
            $item->delete();
            return $this->listarFaltantes('O item ' . $item->nome . ' foi excluído com sucesso.');
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function inserirFaltante(Request $request): View
    {
        try {
            Item::inserirFaltante($request->nome);
            return $this->listarFaltantes();
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function listarFaltantes($mensagem = ''): View
    {
        try {
            return view('item.faltantes', [
                'itens' => Item::faltantes(),
                'mensagem' => $mensagem
            ]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function procurar(Request $request): View
    {
        try {
            return view('item.lista', ['itens' => Item::comTrecho($request->trecho)]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }
}
