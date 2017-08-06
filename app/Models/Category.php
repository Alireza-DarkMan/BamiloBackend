<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use NodeTrait;

    protected $fillable = ['parent_id', 'title', 'desc'];

    public function attributes()
    {
    	return $this->hasMany(Attribute::class);
    }

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
