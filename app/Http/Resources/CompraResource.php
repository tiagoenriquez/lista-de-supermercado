<?php

namespace App\Http\Resources;

use App\Models\Compra;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class CompraResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Compra $compra): array
    {
        return [
            'id' => $compra->id,
            'data' => Carbon::createFromDate($compra->data)->format('d/m/Y')
        ];
    }

    public static function collection(Collection $compras): array
    {
        $resource = [];
        foreach ($compras as $compra) {
            $compraResource = new CompraResource();
            array_push($resource, $compraResource->toArray($compra));
        }
        return $resource;
    }
}
