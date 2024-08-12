<?php

namespace App\Http\Controllers;

use App\Models\ItemNaCompra;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ItemNaCompraController extends Controller
{
    public function comprarItens(array $itensIds, int $compraId): View
    {
        try {
            ItemNaCompra::comprarItens($itensIds, $compraId);
            $itemController = new ItemController();
            return $itemController->comprar($itensIds);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }
}
