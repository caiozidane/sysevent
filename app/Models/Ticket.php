<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'datetime_begin',
        'datetime_end', 'amount', 'publish',
    ];

    public function event()
    {
        return $this->hasOne(Event::class);
    }

    public function Subscriptios()
    {
        return $this->hasMany(Subscription::class);
    }
}
