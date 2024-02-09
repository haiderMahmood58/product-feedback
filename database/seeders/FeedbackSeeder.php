<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feedback;
use App\Models\User;

class FeedbackSeeder extends Seeder
{
    public function run(): void
    {
        $randomUser = User::inRandomOrder()->first();

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
            ],
        ];

        foreach ($feedbackData as $data) {
            Feedback::create($data);
        }
    }
}
