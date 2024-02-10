<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function test_can_create_user()
    {
        $user = new User([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123'),
        ]);

        $user->save();

        $savedUser = User::where('email', 'john@example.com')->first();

        $this->assertEquals('John Doe', $savedUser->name);
        $this->assertEquals('john@example.com', $savedUser->email);
    }
}
