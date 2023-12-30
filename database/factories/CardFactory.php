<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\BoardList;
use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    protected $model = Card::class;

    public function definition()
    {
        $this->faker->locale();
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'board_list_id' => BoardList::factory(),
            'due_date' => $this->faker->date,
            'start_date' => $this->faker->date,
        ];
    }
}
