<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'code', 'room', 'is_active','start','end'];
    protected $dates = ['created_at, update_at'];

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function quiz() {
        return $this->hasMany(Quiz::class);
    }

    public function participants()
    {
        return $this->hasMany(QueueParticipant::class, 'room_id');
    }
}
