<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'falta'];

    public $timestamps = false;

    public static function comprar(array $ids): void
    {
        foreach ($ids as $id) {
            $item = Item::findOrFail($id);
            $item->update(['nome' => $item->nome, 'falta' => false]);
        }
    }

    public static function comTrecho(string $trecho): Collection
    {
        return Item::where('nome', 'like', '%' . $trecho . '%')->orderBy('nome')->get();
    }

    public static function inserirFaltante(string $nome): void
    {
        $item = Item::where('nome', $nome)->first();
        if (!$item) {
            $item = new Item(['nome' => $nome]);
        }
        $item->falta = true;
        $item->save();
    }

    public static function faltantes(): Collection
    {
        $itens = Item::where('falta', true)->orderBy('nome')->get();
        for ($i = 0; $i < count($itens); $i++) {
            $itens[$i]->indice = $i + 1;
        }
        return $itens;
    }

    public static function naoFaltantes(): Collection
    {
        return Item::where('falta', false)->orderBy('nome')->get();
    }
}
