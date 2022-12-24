<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAttributeController extends Controller
{
    public function index()
    {
        return view('backend.attribute.index');
    }

    public function create()
    {
        return view('backend.attribute.create');
    }

    public function store()
    {
        
    }
}
