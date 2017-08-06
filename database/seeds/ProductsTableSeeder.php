<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
      $categories = App\Models\Category::all();

      foreach($categories as $category) {
      		factory(App\Models\Product::class, $faker->numberBetween(5, 10))
	           ->create(['category_id' => $category->id])
	           ->each(function($product) use ($category, $faker) {
	           	$attributes = [];
	           	foreach($category->attributes as $attribute){
	           		$attributes[$attribute->id] = ['value' => $faker->word];
	           	}

	           	$product->attributes()->sync($attributes);
	           });
	}	          
    }
}
