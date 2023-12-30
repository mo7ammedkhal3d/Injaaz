<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\BoardList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoardList>
 */
class BoardListFactory extends Factory
{
    protected $model = BoardList::class;

    public function definition()
    {
        $this->faker->locale();
        return [
            'title' => $this->faker->word,
            'board_id' => Board::factory(),
        ];
    }
}
