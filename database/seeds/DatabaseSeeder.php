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
        factory(App\Category::class, 10)->create();
        factory(App\User::class, 30)->create();
        factory(App\Post::class, 150)->create();
        factory(App\Reply::class, 1000)->create();
    }
}
