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

    public function index(Request $request, $category)
    {
    	$categories = Category::descendantsAndSelf($category)->pluck('id');

    	$products = Product::whereIn('category_id', $categories);

    	foreach($request->all() as $attribute => $values) {
    		$values = explode(',', $values);

    		$products = $products->whereHas('attributes_relation', function($query) use ($attribute, $values) {
    			$query->where('attribute_id', $attribute)->whereIn('value', $values);
    		});
    	}

    	$products = $products->get();

    	return response()->json($products);
    }
}
