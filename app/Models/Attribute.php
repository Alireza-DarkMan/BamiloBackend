<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['category_id', 'title', 'desc' ];
    protected $hidden = ['products'];
    protected $appends = ['values'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function products()
    {
    	return $this->belongsToMany(Product::class, 'product_attributes')->withPivot('value');
    }

    public function getValuesAttribute()
    {
    	$values = [];
    	foreach($this->products as $product){
    		array_push($values, $product->pivot->value);
    	}

    	return $values;
    }
}
