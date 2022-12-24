<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\AdminProduct\IAdminProduct;
use Illuminate\Http\Request;

class ProductDetailController extends FrontendController
{
    private $adminProduct;

    public function __construct(IAdminProduct $adminProduct)
    {
        $this->adminProduct = $adminProduct;
    }

    public function getProductDetail(Request $request, $slug)
    {
        $arrSlug = explode('-', $slug);
        $id = array_pop($arrSlug);

        if ($id) {
            $product = $this->adminProduct->find($id);
            $viewData = [
                'product' => $product,
            ];
            return view('frontend.pages.product.detail', $viewData);
        }

        return redirect()->to('/');
    }
}
