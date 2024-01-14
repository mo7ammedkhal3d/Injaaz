<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lists()
    {
        return $this->hasMany(BoardList::class);
    }

    public function boardMembers()
    {
        return $this->hasMany(BoardMember::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'board_id');
    }

    public static function getBoardInfo($boardId)
    {
        return self::with(['lists' => function ($query) {
                $query->with(['cards' => function ($query) {
                    $query->with(['boardMembers' => function ($query) {
                        $query->with('user');
                    }]);
                }]);
            }])
            ->with(['boardMembers' => function ($query) {
                $query->with('user');
            }])
            ->findOrFail($boardId);
    }
}
