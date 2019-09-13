<?php

namespace Tests\Feature;

use App\Movie;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MoviesManagementTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function admin_can_add_movies()
    {
        $this->withoutExceptionHandling();
        $this->get('/movies/create')->assertOk();

        $attributes = $this->data();

        $this->post('/movies', $attributes);

        $this->assertCount(1, Movie::all());
        $this->assertDatabaseHas('movies', $attributes);
    }

    /** @test */
    public function visitors_can_view_movies_list()
    {
        $this->withoutExceptionHandling();

        $attributes = $this->data();

        $this->post('/movies', $attributes)
             ->assertSee($attributes['name'])
             ->assertSee($attributes['cast']);

        $movies = factory(Movie::class)->create();

        $this->get('/movies')->assertOk();

        $this->assertInstanceOf(Movie::class, $movies);
    }

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
