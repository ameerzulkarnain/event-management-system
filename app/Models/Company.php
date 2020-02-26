<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Company extends Model
{

    protected $table = 'companies';

    // Primary Key
    public $primaryKey = 'id';
    
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->hasMany('App\User');
    }
}