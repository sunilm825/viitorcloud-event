<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventMessage extends Model
{
    use HasFactory;
    protected $fillable = ['event_username', 'event_name', 'event_message', 'event_like'];

    // protected $casts = [
    //     'event_like' => 'boolean',
    // ];
}
