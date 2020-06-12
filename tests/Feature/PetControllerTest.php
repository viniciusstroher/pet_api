<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PetControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testV1ValidatePetRequestCreate()
    {
        $response = $this->get('/');


        // $name = $this->faker->name;
        // $email = $this->faker->safeEmail;

        $response = $this->post('/v1/pets', []);
        // var_dump($response->decodeResponseJson());
        // $response->assertStatus(204);

        // $newsletter->shouldHaveReceived('subscribe', [$email, ['name' => $name]]);

        // $response->assertStatus(200);
    }
}
