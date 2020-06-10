<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Gate;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $categories = Category::all();
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return view('admin/categories/index', [
                'categories' => $categories,
                'user' => $user
            ]);
        }
        return view('categories/index', [
            'categories' => $categories
        ]);
    }
    public function create()
    {
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return view('admin/categories/create');
        }

        return view(
            'categories/create'
        );
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create([
            'name' => $request->validated()['name']
        ]);
        return redirect()->route('categories.index');
    }

    public function show(Request $request)
    {
        $categories = Category::all();
        $request = request();
        $userId = Auth::id();
        $user = User::find($userId);

        $categoryId = $request->category;
        $category = Category::find($categoryId);

        $profs = User::all()->where('role', '=', '2');

        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return view('categories/show', [
                'categories' => $categories,
                'profs' => $profs,
                'category' => $category,
                'user' => $user,

            ]);
        } else {
            return view('categories/show', [
                'profs' => $profs,
                'category' => $category,
                'user' => $user,
                'categories' => $categories
            ]);
        }
    }

    public function edit()
    {
        $categoryId = request()->category;
        $category = Category::find($categoryId);
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return view('admin/categories/edit', [
                'category' => $category
            ]);
        }

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
