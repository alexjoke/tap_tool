<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $fillable = [
        'id',
        'country',
        'ip',
        'ref',
        'user_agent',
        'param1',
        'param2',
        'error',
        'bad_domain',
    ];
}
