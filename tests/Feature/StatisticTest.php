<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class StatisticTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic feature test example.
     */
    public function test_statistics_list_page_show_statistics_correctly(): void
    {
        // Arrange
        $admin = User::factory()->create([
            'type' => User::ADMIN,
        ]);

        // Act
        $this->actingAs($admin)
            ->get('/statistics')

            // Assert
            ->assertStatus(200)
            ->assertSee('/statistics');
    }
}
