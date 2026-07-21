<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable=[
        'user_id',
        'event_id',
        'ticket_code',
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

    
}
