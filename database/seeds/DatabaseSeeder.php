<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(\App\Set::class, 3)->create()->each(function ($set) {
            $setProducts = factory(\App\Product::class, 30)->make();

            $set->products()->saveMany($setProducts);
        });
        factory(\App\Category::class, 3)->create();

    }
}
