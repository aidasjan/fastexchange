<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function faculties(){
        return $this->hasMany('App\Faculty');
    }

    public function users(){
        return $this->hasMany('App\User');
    }

    public function reattachFaculties($item_ids)
    {
        $this->faculties()->detach();
        foreach($item_ids as $item_id){
            if(($item = \App\Faculty::find($item_id)) !== null)
                $this->faculties()->attach($item_id);
            else return;
        }
    }
}
