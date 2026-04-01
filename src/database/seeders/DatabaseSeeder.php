<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    // ① user 1件
    $user = User::factory()->create([
        'name' => 'テストユーザー',
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    // ② weight_logs 35件（user紐付け）
    WeightLog::factory()->count(35)->create([
        'user_id' => $user->id,
    ]);

    // ③ weight_target 1件
    WeightTarget::factory()->create([
        'user_id' => $user->id,
    ]);
    }
}
