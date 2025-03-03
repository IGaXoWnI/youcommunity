<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{

    use HasFactory;

    protected $fillable = ['title', 'description', 'location', 'date_time', 'category', 'user_id', 'max_participants'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'rsvps')->withTimestamps();
    }

    public function rsvps()
    {
        return $this->hasMany(Rsvp::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
