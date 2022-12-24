<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\AdminCategory\IAdminCategory;
use App\Repositories\AdminProduct\IAdminProduct;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{

    protected $adminProduct;
    protected $adminCategory;

    public function __construct(IAdminProduct $adminProduct, IAdminCategory $adminCategory)
    {
        $this->adminProduct = $adminProduct;
        $this->adminCategory = $adminCategory;
    }

    public function index()
    {
        // $categories = $this->adminCategory->all();
        $apples = $this->adminProduct->getNewProducts(1, 4);
        $macs = $this->adminProduct->getNewProducts(2, 4);

        return view('frontend.pages.home.index', [
            'apples' => $apples,
            'macs'   => $macs,
            // 'categories' => $categories,
        ]);

    }
}
