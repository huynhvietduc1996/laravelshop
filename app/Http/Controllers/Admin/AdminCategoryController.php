<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryRequest;
use App\Models\Category;
use App\Repositories\AdminCategory\AdminCategory;
use App\Repositories\AdminCategory\IAdminCategory;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    protected $adminCategory;

    public function __construct(IAdminCategory $adminCategory)
    {
        $this->adminCategory = $adminCategory;
    }

    public function index()
    {
        $categories = $this->adminCategory->paginate(4);
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(AdminCategoryRequest $request)
    {
        // $data = $request->except('_token');
        // $data['c_slug'] = Str::slug($request->c_name);
        // $data['created_at'] = Carbon::now();
        // $id = Category::insertGetId($data);
        // dd($data);

        $category = new Category();
        $category->c_name = $request->c_name;
        $category->c_slug = Str::slug($request->c_name);
        $category->created_at = Carbon::now();
        $category->save();

        // $this->adminCategory->create($category);
        return redirect()->back();
    }

    public function active($id)
    {
        $category = $this->adminCategory->find($id);
        // dd($category);
        $category->c_status = !$category->c_status;
        $category->save();

        return redirect()->back();
    }

    public function hot($id)
    {
        $category = $this->adminCategory->find($id);
        $category->c_hot = !$category->c_hot;
        $category->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $category = $this->adminCategory->find($id);

        return view('backend.categories.edit', compact('category'));
    }

    public function update(AdminCategoryRequest $request, $id)
    {
        $category = $this->adminCategory->find($id);
        $category->c_name = $request->c_name;
        $category->c_slug = Str::slug($request->c_name);
        $category->created_at = Carbon::now();
        $category->save();

        return redirect()->route('admin.category.index');
    }

    public function delete($id)
    {
        $this->adminCategory->delete($id);

        return redirect()->back();
    }
}
