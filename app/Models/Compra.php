<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = ['data'];

    public $timestamps = false;

    public function itens(): Collection
    {
        $itens = Item::join('item_na_compras', 'items.id', 'item_na_compras.item_id')
            ->where('item_na_compras.compra_id', $this->id)
            ->orderBy('items.nome')
            ->get();
        for ($i = 0; $i < count($itens); $i++) {
            $itens[$i]->indice = $i + 1;
        }
        return $itens;
    }
}
