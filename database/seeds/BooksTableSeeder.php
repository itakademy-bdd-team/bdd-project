<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,30) as $index) {
            $nbWords = rand(1, 5);
            $sentence = $faker->sentence($nbWords);
            $sentence = substr($sentence, 0, strlen($sentence) - 1);

            DB::table('books')->insert([
                'isbn' => $faker->isbn13,
                'title' => $sentence,
                'author' => $faker->name,
                'summary' => $faker->text,
                'publisher' => $faker->company,
                'year' => rand(1900, 2017),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
