<?php

namespace Tests\Feature;

use App\Models\Pmodel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory as Faker;

class P_modelTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected function setUp(): void {
        parent::setUp();
        $this->artisan('migrate');
        $this->admin = User::factory()->create(['role' => 0]);
        $this->actingAs($this->admin);
    }

    public function testGetAllP_models(): void {

        $response = $this->get('/pmodels');

        $response->assertStatus(200);
    
    }

    public function testGetOneP_model() : void {

        $p_model = Pmodel::factory()->create();

        $response = $this->get('/pmodels/' . $p_model->id);

        $response->assertStatus(200);

    }

    protected function tearDown(): void {
        parent::tearDown();
    }
}
