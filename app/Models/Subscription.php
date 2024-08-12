<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'ticket_id',
        'first_name',
        'last_name',
        'alias',
        'cpf',
        'email',
        'celphone',
        'phone',
        'birth_date',
        'company',
        'institution',
        'address',
        'city',
        'state'
    ];

    public function Event()
    {
        return $this->hasOne(Event::class);
    }

    public function Ticket()
    {
        return $this->hasOne(Ticket::class);
    }
}
