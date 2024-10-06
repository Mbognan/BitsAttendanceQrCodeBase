<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendace extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_record_id',
        'status',
        'session',
    ];
}
