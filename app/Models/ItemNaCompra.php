<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemNaCompra extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'compra_id'];

    public $timestamps = false;

    public static function comprarItens($itensIds, $compraId): void
    {
        foreach ($itensIds as $itemId) {
            $itemNaCompra = new ItemNaCompra(['item_id' => $itemId, 'compra_id' => $compraId]);
            $itemNaCompra->save();
        }
    }
}
