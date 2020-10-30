<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

}
