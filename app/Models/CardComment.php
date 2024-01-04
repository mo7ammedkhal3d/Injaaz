<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardComment extends Model
{
    use HasFactory;

    protected $fillable = ['board_member_id', 'card_id', 'text'];

    public function boardMember()
    {
        return $this->belongsTo(BoardMember::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
