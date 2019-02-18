<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteMovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate existing records
        DB::table('favorite_movies')->truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('favorite_movies')->insert([
                'title' => $faker->sentence,
                'score' => $faker->numberBetween(0,10),
            ]);
        }
    }
}
