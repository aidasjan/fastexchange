<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions(){
        return $this->belongsToMany('App\Permission');
    }

    public function users(){
        return $this->hasMany('App\User');
    }

    public function reattachPermissions($item_ids)
    {
        $this->permissions()->detach();
        foreach($item_ids as $item_id){
            if(($item = \App\Permission::find($item_id)) !== null)
                $this->permissions()->attach($item_id);
            else return;
        }
    }
    
}
