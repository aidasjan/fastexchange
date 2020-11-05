<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }

    public function reattachTags($item_ids)
    {
        $this->tags()->detach();
        foreach($item_ids as $item_id){
            if(($item = \App\Tag::find($item_id)) !== null)
                $this->tags()->attach($item_id);
            else return;
        }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code', 'degree', 'language', 'credits', 'type', 'semester', 'year', 'isMandatory'
    ];
}
