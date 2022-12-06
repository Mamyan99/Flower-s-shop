<?php

namespace App\Repositories\Write\ShopCart;

use App\Exceptions\DeleteErrorException;
use App\Exceptions\SavingErrorException;
use App\Models\ShopCart\ShopCart;
use Illuminate\Database\Eloquent\Builder;

class ShopCartWriteRepository implements ShopCartWriteRepositoryInterface
{
    public function save(ShopCart $shopCart): ShopCart
    {
        if (!$shopCart->save())
        {
            throw new SavingErrorException();
        }

        return $shopCart;
    }

    public function delete(array $ids): bool
    {
        $query = $this->query();

        if(!$query->whereIn('id', $ids)->delete())
        {
            throw new DeleteErrorException;
        }

        return true;
    }

    private function query(): Builder
    {
        return ShopCart::query();
    }
}
