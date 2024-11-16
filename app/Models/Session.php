<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_id',
        'session',
        'event_record_id',
        'login_status',
        'logout_status',

    ];
}
