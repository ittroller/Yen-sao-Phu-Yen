<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    protected $table = 'loaisanphams';
    protected $fillable = [
        'tenloai',
        'alias',
        'loai_con'
    ];
    public $timestamps = false;
    
    public function sanpham(){
    	return $this->hasMany('App\SanPham');
    }
}
