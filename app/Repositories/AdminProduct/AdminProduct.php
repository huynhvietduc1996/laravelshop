<?php

namespace App\Repositories\AdminProduct;

use App\Models\Product;
use App\Repositories\Repository;

class AdminProduct extends Repository implements IAdminProduct
{
    public function getModel()
    {
        return Product::class;
    }

    public function getNewProducts($categoryId, $numberOfProduct)
    {
        $products = Product::where([
            ['p_category_id', '=', $categoryId],
            ['p_active', '=', 1]
        ])
            ->orderBy('p_name')
            ->take($numberOfProduct)
            ->select('id', 'p_name', 'p_slug', 'p_price', 'p_sale', 'p_avatar')
            ->get();

        return $products;
    }
}
