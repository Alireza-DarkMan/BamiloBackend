<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'title', 'model', 'img_url', 'desc', 'price', 'status', 'quantity'];

    public function attributes()
    {
    	return $this->belongsToMany(Attribute::class, 'product_attributes')->withPivot('value');
    }

    public function attributes_relation()
    {
    	return $this->hasMany(ProductAttribute::class);
    }

    public function category()
    {
    	return $this->belongTo(Category::class);
    }
}
