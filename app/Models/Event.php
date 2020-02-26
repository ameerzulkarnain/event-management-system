<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Event extends Model
{

    protected $table = 'events';

    // Primary Key
    public $primaryKey = 'id';
    
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'name','location','date'
    ];

    public function eventParticipant()
    {
        return $this->hasMany('App\Models\EventParticipant');
    }
}