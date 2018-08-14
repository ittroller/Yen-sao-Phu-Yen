<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnhSanPham extends Model
{
    protected $table = 'anhsanphams';
    protected $fillable = ['anhchitiet','sanpham_id'];
    public $timestamps = false;
	public function sanpham(){
		return $this->belongTo('App\SanPham');
	}
}
