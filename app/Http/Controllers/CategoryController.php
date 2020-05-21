<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories/index', [
            'categories' => $categories
        ]);
    }
    public function create()
    {
        return view(
            'categories/create'
        );
    }

    public function store(StoreCategoryRequest $request)
    {
        // $validated = $request->validated();
        Category::create([
            'name' => $request->validated()['name']
        ]);
        return redirect()->route('categories.index');
    }

    public function show(Request $request)
    {
        $categoryId = $request->category;
        $category = Category::find($categoryId);
        // find prof related to this category
        return view('categories/show', [
            // 'category' => $category
            // send prof instead of category
        ]);
    }

    public function edit()
    {
        $categoryId = request()->category;
        $category = Category::find($categoryId);

        return view('categories/edit', [
            'category' => $category
        ]);
    }

    public function update(UpdateCategoryRequest $request)
    {
        $categoryId = $request->category;
        $category = Category::find($categoryId);

        $data = $request->only(['name']);
        $category->update($data);

        return redirect()->route('categories.index');
    }

    public function destroy()
    {
        $categoryId = request()->category;
        $category = Category::find($categoryId);

        $category->delete();
        return redirect()->route('categories.index');
    }
}
