<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Card;
use App\Models\CardComment;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\BoardList;
use App\Models\Board;
use App\Models\BoardMember;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // Create 5 users, each with 4 boards
       User::factory(5)->create()->each(function ($user) {
        $boards = Board::factory(4)->create(['user_id' => $user->id]);

        // Each user belongs to 2 boards with BoardMember
        BoardMember::factory(2)->create(['user_id' => $user->id])->each(function ($boardMember) use ($boards) {
            $boardMember->update(['board_id' => $boards->random()->id]);
        });

        // Each board has 3 lists
        $boards->each(function ($board) {
            $lists = BoardList::factory(3)->create(['board_id' => $board->id]);

            // Each list has 5 cards
            $lists->each(function ($list) {
                $cards = Card::factory(5)->create(['board_list_id' => $list->id]);

                // Each card has comments
                $cards->each(function ($card) {
                    CardComment::factory(2)->create(['card_id' => $card->id]);
                });
            });
        });
    });
    }
}
