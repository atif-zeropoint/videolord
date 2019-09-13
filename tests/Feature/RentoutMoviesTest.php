<?php

namespace Tests\Feature;

use App\Movie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RentoutMoviesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function user_able_to_rent_out()
    {
        $this->withoutExceptionHandling();
        $movie = Movie::create($this->data());

        $this->get('/movies/' . $movie->id . '/show')
             ->assertOk()
             ->assertSee($movie->name)
             ->assertSee($movie->cast)
             ->assertSee($movie->image)
             ->assertSee('Add to rent cart');
    }

    // Movies only in stock can be rent out
    // User who already have movies can't rent out any more movies
    // Multiple movies can be rent out in one transaction
    // Multiple movies can be checked in on transaction
    //

    public function data()
    {
        return [
            'name'        => $this->faker->text,
            'cast'        => $this->faker->text,
            'genere'      => $this->faker->text,
            'description' => $this->faker->paragraph,
            'image'       => $this->faker->text,
        ];
    }


}
