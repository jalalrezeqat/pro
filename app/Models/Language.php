<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Language extends Model
{

    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds
    
    protected $guarded = ['id'];
}
