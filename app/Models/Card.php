<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'board_list_id', 'due_date', 'start_date', 'progress_rate', 'position']; 

    public function boardList()
    {
        return $this->belongsTo(BoardList::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function boardMembers()
    {
        return $this->belongsToMany(BoardMember::class, 'card_assigned')->withPivot([]);
    }

    public function cardComments()
    {
        return $this->hasMany(CardComment::class);
    }
}