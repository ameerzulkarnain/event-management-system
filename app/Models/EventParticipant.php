<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class EventParticipant extends Model
{

    protected $table = 'event_participants';

    // Primary Key
    public $primaryKey = 'id';
    
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'event_id', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }
}