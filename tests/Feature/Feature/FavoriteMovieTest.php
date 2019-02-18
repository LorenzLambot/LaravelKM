<?php

use App\FavoriteMovie;
use App\User;
use Tests\TestCase;

class FavoriteMovieTest extends TestCase
{
    public function testsFavoriteMoviesCreate()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'title' => 'Lorem',
            'score' => 0,
        ];

        $this->json('POST', '/api/FavoriteMovies', $payload, $headers)
            ->assertStatus(201)
            ->assertJsonFragment(['title' => 'Lorem', 'score' => 0]);
    }

    public function testsFavoriteMoviesUpdate()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $FavoriteMovie = factory(FavoriteMovie::class)->create([
            'title' => 'FavoriteMovie',
            'score' => 0,
        ]);

        $payload = [
            'title' => 'Lorem',
            'score' => 0,
        ];

        $response = $this->json('PUT', '/api/FavoriteMovies/' . $FavoriteMovie->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'id' => 1,
                'title' => 'Lorem',
                'score' => 0
            ]);
    }

    public function testsFavoriteMoviesDelete()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $FavoriteMovie = factory(FavoriteMovie::class)->create([
            'title' => 'First FavoriteMovie',
            'score' => 0,
        ]);

        $this->json('DELETE', '/api/FavoriteMovies/' . $FavoriteMovie->id, [], $headers)
            ->assertStatus(204);
    }

    public function testFavoriteMoviesGetList()
    {
        factory(FavoriteMovie::class)->create([
            'title' => 'FavoriteMovie 1',
            'score' => 0
        ]);

        factory(FavoriteMovie::class)->create([
            'title' => 'FavoriteMovie 2',
            'score' => 9
        ]);

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/FavoriteMovies', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                [ 'title' => 'FavoriteMovie 1', 'score' => 0 ],
                [ 'title' => 'FavoriteMovie 2', 'score' => 9 ]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'score', 'title', 'created_at', 'updated_at'],
            ]);
    }

}
