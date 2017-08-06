<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        factory(App\Models\Category::class, 5)
           ->create()
           ->each(function ($cat) use($faker) {
           		if($faker->boolean){
	           		factory(App\Models\Category::class, 3)
	                		->create()
	                		->each(function ($sub) use ($cat, $faker) {
	                			$cat->appendNode($sub);

	                			if($faker->boolean){
	                				factory(App\Models\Category::class, 2)
				                		->create()
				                		->each(function ($sub2) use ($sub) {
	                						$sub->appendNode($sub2);
	                					});
	                			}
	                		});
           		}
            });
    }
}
