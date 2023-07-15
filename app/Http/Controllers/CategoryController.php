<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;
use Stichoza\GoogleTranslate\GoogleTranslate;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::where('user_id', Auth::id())->get()->toArray();

        $data = $this->categoryList($categories);
        $edit = session()->has('editCategory');
        $add = session()->has('addCategory');

        return view('/add-product', compact(['data', 'edit', 'add']));
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $en = new GoogleTranslate('en');
        $name_en = $en->translate($request->name);

        $category->user_id = Auth::id();
        $category->name = $request->name;
        $category->name_en = $name_en ?? null;

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
        $en = new GoogleTranslate();
        $name_en = $en->setSource('pl')->setTarget('en')->translate($request->name);

        $category->name = $request->name;
        $category->name_en = $name_en ?? null;
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
