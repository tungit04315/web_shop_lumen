<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    //

    protected $table = 'notification';
    public $timestamps = false;

    protected $filltable = [
        'notification_title','notification_describe'
    ];
}
