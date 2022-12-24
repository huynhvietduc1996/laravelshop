<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProductRequest;
use App\Models\Product;
use App\Repositories\AdminCategory\IAdminCategory;
use App\Repositories\AdminProduct\IAdminProduct;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    private $adminProduct;
    private $adminCategory;

    public function __construct(IAdminProduct $adminProduct, IAdminCategory $adminCategory)
    {
        $this->adminProduct = $adminProduct;
        $this->adminCategory = $adminCategory;
    }

    public function index()
    {
        $products = $this->adminProduct->paginate(10);

        return view('backend.product.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->adminCategory->all();

        return view('backend.product.create', compact('categories'));
    }

    public function store(AdminProductRequest $request)
    {
        $data = $request->except('_token');
        $data['p_slug'] = Str::slug($request->p_name);
        $data['created_at'] = Carbon::now();

        if ($request->p_avatar) {
            $image = upload_image('p_avatar');
            if ($image['code'] == 1) {
                $data['p_avatar'] = $image['name'];
            }
        }
        $this->adminProduct->create($data);

        return redirect()->back();
    }

    public function edit($id)
    {
        $product = $this->adminProduct->find($id);
        $categories = $this->adminCategory->all();

        return view('backend.product.edit', compact('product', 'categories'));
    }

    public function update(AdminProductRequest $request, $id)
    {
        $product = $this->adminProduct->find($id);
        $product->p_name = $request->p_name;
        $product->p_slug = Str::slug($request->p_name);
        $product->p_price = $request->p_price;
        $product->p_content = $request->p_content;
        $product->p_description = $request->p_description;
        $product->created_at = Carbon::now();

        if ($request->p_avatar) {
            $image = upload_image('p_avatar');
            if ($image['code'] == 1) {
                $product->p_avatar = $image['name'];
            }
        }

        $product->save();

        return redirect()->route('admin.product.index');

    }

    public function delete($id)
    {
        $this->adminProduct->delete($id);

        return redirect()->route('admin.product.index');
    }

    public function active($id)
    {
        $product = $this->adminProduct->find($id);
        $product->p_active = !$product->p_active;
        $product->save();

        return redirect()->back();
    }

    public function hot($id)
    {
        $product = $this->adminProduct->find($id);
        $product->p_hot = !$product->p_hot;
        $product->save();

        return redirect()->back();
    }
}
