<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.category', [
            'title' => 'Kategori',
            'active' => 'category',
            'categories' => Category::all()
        ]);
    }
}
