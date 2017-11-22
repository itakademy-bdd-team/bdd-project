<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;

use App\User;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testList()
    {
        $user = User::findOrFail(1);
        $response = $this->actingAs($user)->get('/books');
        $response->assertViewIs('books');
    }

    public function testConnexion()
    {
        $user = User::findOrFail(1);

        $response = $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/books');

        $response->assertStatus(200)->assertSee('List of books');


    }

}
