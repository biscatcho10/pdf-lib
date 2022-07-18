<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'host_id',
        'host_name',
        'meeting_id',
        'title',
        'description',
        'image',
        'start_time',
        'duration',
        'password',
        'start_url',
        'join_url',
    ];
}
