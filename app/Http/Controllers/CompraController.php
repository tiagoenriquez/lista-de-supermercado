<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompraResource;
use App\Models\Compra;
use App\Models\Item;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function cadastrar(): View
    {
        try {
            return view('compra.cadastro', [
                'hoje' => Carbon::now()->format('Y-m-d'),
                'itens' => Item::faltantes()
            ]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function inserir(Request $request): View
    {
        try {
            $compra = new Compra(['data' => $request->data]);
            $compra->save();
            $itemNaCompraController = new ItemNaCompraController();
            return $itemNaCompraController->comprarItens(json_decode($request->itens), $compra->id);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function listar(): View
    {
        try {
            return view('compra.lista', ['compras' => CompraResource::collection(Compra::all())]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function listarItens(int $id): View
    {
        try {
            $compra = Compra::findOrFail($id);
            return view('compra.itens', ['compra' => $compra]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }
}
