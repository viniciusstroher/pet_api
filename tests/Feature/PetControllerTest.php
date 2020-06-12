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
        $response = $this->post('/v1/pets', ['name'=>'Bolinha','race'=>'C']);
        $response->assertStatus(200);
    }
}
