<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function Parent(){      
            return $this->belongsTo('App\University');
    }
}
