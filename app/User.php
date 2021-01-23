<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','lname', 'email','whatsapp_phone','phone_2', 'password','university_id','role_id',
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

    public function university(){
        return $this->belongsTo('App\University');
    }

    public function product(){
        return $this->hasMany('App\Product');
    }

    public function chuoproduct(){
        return $this->hasMany('App\Chuoproduct');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function isAdmin(){
        if ($this->role_id == 2 || $this->role_id == 3) {
            return true;
        }else{
            return false;
        }

    }

    public function isSuperAdmin(){
        if ($this->role_id == 3) {
            return true;
        }else{
            return false;
        }

    }


}
