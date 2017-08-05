<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function all()
    {
    	$products = Product::all();

    	return response()->json($products);
    }

    public function index(Category $category)
    {
    	$products = $category->products;

    	return response()->json($products);
    }
}
