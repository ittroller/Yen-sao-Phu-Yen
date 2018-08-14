<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiBaiViet extends Model
{
    protected $table = 'loaibaiviets';
    protected $fillable = ['tenloai','alias'];
    public $timestamps = true;
    
    public function baiviet(){
    	return $this->hasMany('App\BaiViet');
    }
}
