<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('user_id', Auth::id())->get();
        $first = $categories->where('category_id', '===', null);

        // dd($categories);
        $data = $this->categoryList($categories, $first);

        dd($data);
        return view('/dashboard', compact('data'));
    }

    private function categoryList(Collection $categories, Collection $parent)
    {
        $data = [];

        foreach ($parent as $child) {

            $data = $categories->where('category_id', '===', $child->id);

            if ($child->has_child === false) {
                return $data;
            } else {
                return $this->categoryList($categories, $data);
            }
        }
        return $data;
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
