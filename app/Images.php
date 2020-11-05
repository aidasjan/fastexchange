<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = ['Title', 'Caption', 'Height','Width','id_review', 'user_image'];
}
