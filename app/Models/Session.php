<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Session
 */
class Session extends Model
{
    protected $table = 'sessions';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity'
    ];

    protected $guarded = [];

        
}