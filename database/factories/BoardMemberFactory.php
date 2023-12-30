<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\BoardMember;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoardMember>
 */
class BoardMemberFactory extends Factory
{
    protected $model = BoardMember::class;

    public function definition()
    {
        $this->faker->locale();
        return [
            'user_id' => User::factory(),
            'board_id' => Board::factory(),
        ];
    }
}
