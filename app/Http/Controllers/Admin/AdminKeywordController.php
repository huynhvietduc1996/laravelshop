<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminKeywordRequest;
use App\Models\Keyword;
use App\Repositories\AdminKeyword\IAdminKeyword;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminKeywordController extends Controller
{
    protected $adminKeyword;

    public function __construct(IAdminKeyword $adminKeyword)
    {
        $this->adminKeyword = $adminKeyword;
    }

    public function index() 
    {
        $keywords = $this->adminKeyword->all();

        return view('backend.keywords.index', compact('keywords'));    
    } 
    
    public function create()
    {
        return view('backend.keywords.create');
    }

    public function store(AdminKeywordRequest $request)
    {
        $keyword = new Keyword();
        $keyword->k_name = $request->k_name;
        $keyword->k_description = $request->k_description;
        $keyword->k_slug = Str::slug($request->k_name);
        $keyword->created_at = Carbon::now();
        $keyword->save();

        return redirect()->route('admin.keyword.index');
    }

    public function edit($id)
    {
        $keyword = $this->adminKeyword->find($id);

        return view('backend.keywords.edit', compact('keyword'));
    }

    public function update(AdminKeywordRequest $request, $id)
    {
        $keyword = $this->adminKeyword->find($id);

        $keyword->k_name = $request->k_name;
        $keyword->k_slug = Str::slug($request->k_name);
        $keyword->created_at = Carbon::now();
        $keyword->save();

        return redirect()->route('admin.keywords.index');
    }

    public function delete($id)
    {
        $this->adminKeyword->delete($id);

        return redirect()->back();
    }

}
