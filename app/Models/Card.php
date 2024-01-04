<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'board_list_id', 'due_date', 'start_date'];

    public function boardList()
    {
        return $this->belongsTo(BoardList::class);
    }

    public function boardMembers()
    {
        return $this->belongsToMany(BoardMember::class, 'card_assigned')->withTimestamps();
    }

    public function cardComments()
    {
        return $this->hasMany(CardComment::class);
    }
}
