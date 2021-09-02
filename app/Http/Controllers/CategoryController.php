<?php

namespace App\Http\Controllers;

use App\Models\ObjectCategory;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $lang='en')
    {
        App::setLocale($lang);
        if ($request->ajax()) {
            $categories = ObjectCategory::with(['subcategories', 'things', 'properties'])
                ->where('mode', 'article')
                ->orWhere('mode', 'calculator')
                ->orWhere('mode', 'grid')
                ->get();
            return response()->json([
                'categories' => $categories
            ]);
        }

        $categories = ObjectCategory::all();

        return view('admin.pages.categories.index', compact('categories'));
    }

    public function get()
    {
        $categories = ObjectCategory::with(['subcategories', 'things', 'properties'])->get();
        return response()->json([
            'categories' => $categories
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.pages.categories.create');
    }

    /**
     * @param \App\Http\Requests\CategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = ObjectCategory::create($request->validated());

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $category = ObjectCategory::find($id);
        return view('admin.pages.categories.show', compact('category'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $category = ObjectCategory::find($id);
        return view('admin.pages.categories.update', compact('category'));
    }

    /**
     * @param \App\Http\Requests\CategoryUpdateRequest $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = ObjectCategory::find($id);
        $category->update($request->validated());

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $category = ObjectCategory::find($id);
        $category->delete();

        return response()->noContent();
    }
}
