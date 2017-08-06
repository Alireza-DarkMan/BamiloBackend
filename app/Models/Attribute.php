<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['category_id', 'title', 'desc'];
    protected $hidden = ['values_relation'];
    protected $appends = ['values'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function products()
    {
    	return $this->belongsToMany(Product::class, 'product_attributes')->withPivot('value');
    }

    public function values_relation()
    {
    	return $this->hasMany(ProductAttribute::class);
    }

    public function getValuesAttribute()
    {
    	if ( ! array_key_exists('values_relation', $this->relations)) $this->load('values_relation');
    	
    	return $this->values_relation()->selectRaw('value')->orderBy('value', 'asc')->get()->pluck('value');
    }
}
