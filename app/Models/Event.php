<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'phone',
        'mail',
        'description',
        'datetime_begin',
        'datetime_end',
        'country_address',
        'publish_events' => 1,
        'situation' => 1,
    ];

    public function getEventsPublishActive()
    {
        return $this->where('publish_events', 1)
                    ->where('situation', 1)
                    ->get();
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }

    // public function Subscriptions()
    // {
    //     return $this->hasMany(Subscription::class);
    // }

    public function subscriptios()
    {
        return $this->hasOneThrough(Subscription::class, Ticket::class);
    }
}
