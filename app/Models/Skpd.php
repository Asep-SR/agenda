<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skpd extends Model
{
    use HasFactory;

    protected $table = "skpd";

    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(User::class, 'skpd_id');
    }

    public function events()
    {
        return $this->hasManyThrough(Event::class, User::class, 'skpd_id', 'user_id');
    }
}
