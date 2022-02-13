<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\Logistic;
use Rennokki\QueryCache\Traits\QueryCacheable;

class LogisticArea extends Model
{

  use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds

    protected $guarded = ['id'];

    public function scopeActive($query){
        return  $query->where('is_active', 1);
    }

    public function division()
    {
      return $this->hasOne(District::class,'id','division_id');
    }

    public function logistic()
    {
      return $this->hasOne(Logistic::class,'id','logistic_id');
    }

    public function logistics()
    {
      return $this->hasMany(Logistic::class,'id','logistic_id');
    }

    public function area()
    {
      return $this->hasMany(Logistic::class,'id','area_id');
    }

    //END
}
