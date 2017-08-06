<?php

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
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
      		factory(App\Models\Attribute::class, $faker->numberBetween(3, 6))
	           ->create(['category_id' => $category->id]);
      }
    }
}
