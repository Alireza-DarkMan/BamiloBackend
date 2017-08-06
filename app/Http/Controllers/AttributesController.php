<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class AttributesController extends Controller
{
    public function index(Category $category)
    {
	$attributes = $category->attributes;

    	return response()->json($attributes);
    }
}
