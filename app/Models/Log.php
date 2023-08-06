<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'logs';

    // Define the fields that can be mass assigned
    protected $fillable = [
        'email',
        'message',
        'location'
    ];
}
