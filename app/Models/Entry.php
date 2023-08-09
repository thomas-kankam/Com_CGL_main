<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'action',
        'other',
        'user_id', // 'user_id' is the foreign key
        'user_email',
        'location',
        'longitude',
        'latitude',
        'incoming_cable',
        'incoming_cable_type',
        'incoming_buffer',
        'incoming_core',
        'outgoing_cable',
        'outgoing_cable_type',
        'outgoing_buffer',
        'outgoing_core',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
