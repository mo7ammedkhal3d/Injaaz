<?php

namespace Database\Factories;

use App\Models\Notification;
use App\Models\User;
use App\Models\Board;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    public function definition()
    {
        return [
            'sender_user_id' => User::factory(),
            'recipient_user_id' => User::factory(),
            'board_id' => Board::factory(),
            'text' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['inprogress', 'reject', 'confirm']),
            'inbox' => true, 
            'readed' => false, 
        ];
    }
}
