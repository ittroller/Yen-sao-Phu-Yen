<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'hoten',
        'email',
        'password',
        'diachi',
        'anhdaidien',
        'sdt',
        'quyen'
    ];
    public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
    public function baiviet(){
    	return $this->hasMany('App\BaiViet');
    }
}
