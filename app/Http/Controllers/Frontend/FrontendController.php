<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\AdminCategory\IAdminCategory;

use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    protected $adminCategory;
    public function __construct()
    {
    }

    public function getCategories()
    {
    }
}
