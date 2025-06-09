<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BeautyPlan; // <-- Add this line

class BeautyPlanSeeder extends Seeder
{
    public function run()
    {
        $plans = [
            ['title' => '🌅 Skincare pagi', 'date' => '2025-06-28'],
            ['title' => '🌅 Skincare malam', 'date' => '2025-06-29'],
            ['title' => '💄 Makeup Routine', 'date' => '2025-06-30'],
        ];

        foreach ($plans as $plan) {
            BeautyPlan::create([
                'user_id' => 1,
                'title' => $plan['title'],
                'date' => $plan['date'],
            ]);
        }
    }
}