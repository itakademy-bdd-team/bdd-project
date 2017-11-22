<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Books;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BookTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testList()
    {
        $admin = User::findOrFail(1);
        $response = $this->actingAs($admin)->get('/books');
        $response->assertViewIs('books');

        $user = User::findOrFail(2);
        $response = $this->actingAs($user)->get('/books');
        $response->assertViewIs('books');
    }

    public function testDelete()
    {
        $faker = Faker::create();

        $nbWords = rand(1, 5);
        $sentence = $faker->sentence($nbWords);
        $sentence = substr($sentence, 0, strlen($sentence) - 1);

        $book = new Books([
            'isbn' => $faker->isbn13,
            'title' => $sentence,
            'author' => $faker->name,
            'summary' => $faker->text,
            'publisher' => $faker->company,
            'year' => rand(1900, 2017),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        $book->save();

        $admin = User::findOrFail(1);
        $response = $this->actingAs($admin)->delete('/books/' . $book->id);
        $response->assertRedirect(route('books.index'));
        $this->assertTrue($book->delete());


        $user = User::findOrFail(2);
        $response = $this->actingAs($user)->delete('/books/' . $book->id);
        $response->assertRedirect('books');
        $response->assertSessionHas('status', "Vous n'etes pas autoriser à afficher cet page");

    }
}
