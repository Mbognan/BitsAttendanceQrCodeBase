<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_record_id',
        'event_days',
        'session',
    ];

    public function event(){
        return $this->belongsTo(EventRecord::class, 'event_record_id');
    }
}
