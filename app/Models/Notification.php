<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'sender_user_id',
        'recipient_user_id',
        'board_id', // Add board_id to the fillable array
        'text',
        'status',
        'inbox', 
        'readed',
    ];

    protected $casts = [
        'inbox' => 'boolean',
        'readed' => 'boolean',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_user_id');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_user_id');
    }

    public function board()
    {
        return $this->belongsTo(Board::class, 'board_id');
    }
}
