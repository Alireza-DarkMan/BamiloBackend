<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_id', 'title', 'desc'];
    protected $hidden = ['childs'];
    protected $appends = ['childrens'];

    public function childs()
    {
    	return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
    	return $this->belongsTo(Category::class, 'parent_id');
    }

    public function attributes()
    {
    	return $this->hasMany(Attribute::class);
    }

    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function getChildrensAttribute()
    {
    	return $this->childs;
    }
}
