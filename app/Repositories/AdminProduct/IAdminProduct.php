<?php

namespace App\Repositories\AdminProduct;

use App\Repositories\IRepository;

interface IAdminProduct extends IRepository
{
    public function getNewProducts($categoryId, $numberOfProduct);
}
