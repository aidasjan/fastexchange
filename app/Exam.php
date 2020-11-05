<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function language_level(){
        return $this->belongsTo('App\LanguageLevel');
    }
}
