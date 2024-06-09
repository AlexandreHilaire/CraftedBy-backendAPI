<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected function setUp(): void {
        parent::setUp();
        $this->artisan('migrate');
        $this->admin = User::factory()->create(['role' => '0']);
        $this->actingAs($this->admin);
    }

    public function testGetallCategories(): void {
        $response = $this->get('/categories');

        $response->assertStatus(200);
    }

    protected function tearDown(): void {
        parent::tearDown();
    }
}