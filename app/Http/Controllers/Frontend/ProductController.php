<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use App\Repositories\AdminProduct\IAdminProduct;
use Illuminate\Http\Request;

class ProductController extends FrontendController
{
    private $adminProduct;

    public function __construct(IAdminProduct  $adminProduct)
    {
        $this->adminProduct = $adminProduct;
    }

    public function index()
    {
        $products = Product::where('p_active', 1)
            ->get();

        $attributes = $this->syncAttributeGroup();
        $viewData = [
            'attributes' => $attributes,
            'products' => $products,
        ];

        return view('frontend.pages.product.index', $viewData);
    }

    public function syncAttributeGroup()
    {
        $attributes = Attribute::get()->toArray();
        $groupAttribute = [];

        foreach ($attributes as $key => $attribute)
        {
            $groupAttribute[$attribute['atb_type']] == $attribute;
        }

        return $groupAttribute;
    }
}
