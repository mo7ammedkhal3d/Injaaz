<?php

namespace Database\Factories;

use App\Models\BoardMember;
use App\Models\Card;
use App\Models\CardComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CardComment>
 */
class CardCommentFactory extends Factory
{
    protected $model = CardComment::class;

    public function definition()
    {
        $this->faker->locale();
        return [
            'board_member_id' => BoardMember::factory(),
            'card_id' => Card::factory(),
            'text' => $this->faker->paragraph,
        ];
    }
}
