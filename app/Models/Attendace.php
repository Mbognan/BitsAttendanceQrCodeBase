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
        'event_day',
        'login_log',
        'logout_log'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function event(){
        return $this->belongsTo(EventRecord::class, 'event_record_id');
    }
}
