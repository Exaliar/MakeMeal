<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('user_id', Auth::id())->get()->toArray();

        $data = $this->categoryList($categories);

        // dd($data);
        return view('/dashboard', compact('data'));
    }

    private function categoryList(array $categories, int|null $parentId = null)
    {
        $tree = [];

        foreach ($categories as $category) {

            if ($category['category_id'] === $parentId) {
                $children = $this->categoryList($categories, $category['id']);
                if ($children) {
                    $category['children'] = $children;
                }
                $tree[] = $category;
            }
        }
        return $tree;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validate = $request->validated();
        $category = new Category();

        $category->user_id = Auth::id();
        $category->name = $request->name;

        if ($request->has('category')) {

            $parent = Category::find($request->category);
            $parent->has_child = true;
            $parent->save();

            $category->category_id = $request->category;
        }
        $category->save();

        return redirect('/category');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
