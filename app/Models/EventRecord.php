<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRecord extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'academic_year',
        'year',
        'status',
        'span',
    ];
    public function event(){
        return $this->hasMany(Attendace::class, 'event_record_id');
    }

    public function eventDays(){
        return $this->hasMany(EventDay::class, 'event_record_id');
    }
}
