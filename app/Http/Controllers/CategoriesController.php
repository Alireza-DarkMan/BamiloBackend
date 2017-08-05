<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Http\Requests\CategoryStoreRequest as StoreRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
    	$categories = Category::with(['childs', 'attributes'])->where('parent_id', null)->get();

    	return response()->json($categories);
    }

    public function store(StoreRequest $request)
    {
    	$category = Category::create($request->all());

    	return response()->json($category);
    }

    public function update(StoreRequest $request, Category $category)
    {
    	$update = $category->update($request->all());

    	return response()->json($update);
    }
}
