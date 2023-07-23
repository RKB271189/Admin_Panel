<?php

namespace App\Repository\Product;

use App\Repository\ModelInterface;

interface ProductInterface extends ModelInterface
{
    public function PaginateProduct(int $pgValue, int $currentPage): ?array;
}
