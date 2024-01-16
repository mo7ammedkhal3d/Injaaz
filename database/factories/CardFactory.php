<?php

namespace Database\Factories;

use App\Models\BoardList;
use App\Models\Card;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    protected $model = Card::class;

    public function definition()
    {
        $this->faker->locale();
        $boardList = BoardList::factory()->create();

        // Calculate the next position for the given board_list_id
        $position = Card::where('board_list_id', $boardList->id)->max('position') + 1;

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'board_list_id' => $boardList->id,
            'user_id' => User::factory(),
            'due_date' => $this->faker->date,
            'start_date' => $this->faker->date,
            'progress_rate' => $this->faker->numberBetween(1, 100),
            'position' => $position,
        ];
    }
}