<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Feedback;

class FeedbackTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_submit_feedback()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->post(route('feedback.create'), [
                             'title' => 'Test Feedback',
                             'description' => 'This is a test feedback description.',
                             'category' => 'bug',
                         ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('feedback', [
            'title' => 'Test Feedback',
            'description' => 'This is a test feedback description.',
            'category' => 'bug',
            'user_id' => $user->id,
        ]);
    }
}
