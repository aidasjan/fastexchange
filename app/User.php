<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'surname', 'phone', 'personal_code', 'country_id', 'city', 'address', 'relative_name', 'relative_phone', 'bank_account', 'native_language', 'postal_code', 'role_id', 'university_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function exams(){
        return $this->belongsToMany('App\Exam');
    }

    public function modules() {
        return $this->belongsToMany('App\Module');
    }

    public function university() {
        return $this->belongsTo('App\University');
    }

    public function country(){
        return $this->belongsTo('App\Country');
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

    public function getPermissions(){
        return $this->role->permissions;
    }

    public function hasPermission($permission_code){
        return $this->role->permissions->contains('code', $permission_code);
    }

    public function getModulesInUserUniversity() {
        $modules = [];
        $faculties = \App\University::find($this->university_id)->faculties;
        foreach ($faculties as $faculty) {
            foreach ($faculty->modules as $module) {
                array_push($modules, $module);
            }
        }
        return collect($modules);
    }
}
