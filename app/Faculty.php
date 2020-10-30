<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{

    public function universities(){
        return $this->hasMany('App\University');
    }

    public function reattachModules($item_ids)
    {
        $this->modules()->detach();
        foreach($item_ids as $item_id){
            if(($item = \App\Module::find($item_id)) !== null)
                $this->modules()->attach($item_id);
            else return;
        }
    }
}
