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

    public function create()
    {
        return view('dashboard.createcategory', [
            'title' => 'Buat kategori baru',
            'active' => 'category'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories,name',
            'description' => 'nullable'
        ]);

        Category::create($validated);
        return redirect('/dashboard/categories');
    }
}
