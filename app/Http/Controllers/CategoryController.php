<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('admin.category.categoryCreate');
    }

    public function store()
    {
        // dd(request()->all());
        $data = request()->validate([
            'name' => 'required',
            'description' => 'nullable',
            'enabled' => 'boolean',
        ]);

        Category::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'enabled' => $data['enabled'],
        ]);

        return redirect('home');
    }

    public function show(){
        $categories = Category::orderBy('id')->get();
        return view('admin.category.categoryIndex', compact('categories'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.categoryEdit', compact('category'));
    }

    public function update(Category $category)
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'nullable',
            'enabled' => 'boolean',
        ]);
  
        $category->update($data);

        return redirect("/c");
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/c');
    }
}
