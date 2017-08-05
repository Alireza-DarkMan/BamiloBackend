<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Models\Product::class, 10)
           ->create()
           ->each(function ($product) {
           		factory(App\Models\Attribute::class, 5)
                		->create(['category_id' => $product->category_id])
                		->each(function ($attribute) use ($product) {
                			$product->attributes()->attach([$attribute->id => ['value' => 'something']]);
                		});
            });
    }
}
