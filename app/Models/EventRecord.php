<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRecord extends Model
{
    use HasFactory;

    public function event(){
        return $this->hasMany(Attendace::class, 'event_record_id');
    }
}
