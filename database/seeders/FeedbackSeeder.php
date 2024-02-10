<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Feedback;

class FeedbackSeeder extends Seeder
{
    public function run(): void
    {
        if (User::count() === 0) {
            $this->command->info('No users found. Skipping feedback seeding.');
            return;
        }

        $randomUser = User::inRandomOrder()->first();

        if (!$randomUser) {
            $this->command->error('Failed to fetch a random user. Skipping feedback seeding.');
            return;
        }

        $feedbackData = [
            [
                'user_id' => $randomUser->id,
                'title' => 'Bug Report',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'category' => 'bug',
            ],
            [
                'user_id' => $randomUser->id,
                'title' => 'Feature Request',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'category' => 'feature',
            ],
            [
                'user_id' => $randomUser->id,
                'title' => 'Improvement Request',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'category' => 'improvement',
            ]
        ];

        foreach ($feedbackData as $data) {
            Feedback::create($data);
        }
    }
}
