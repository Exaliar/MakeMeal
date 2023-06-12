<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Traits\MainDashboard\AddCategory;
use App\Traits\MainDashboard\EditCategory;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    use EditCategory, AddCategory;

    public function index()
    {
        $categories = Category::where('user_id', Auth::id())->get()->toArray();

        $data = $this->categoryList($categories);
        $edit = $this->canEditCategory();
        $add = $this->canAddCategory();
        // dd($edit, $add);


        // dd($data);
        return view('/dashboard', compact(['data', 'edit', 'add']));
    }

    public function store(StoreCategoryRequest $request)
    {
        // $validate = $request->validated();
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

        return redirect()->route('category.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
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
}
