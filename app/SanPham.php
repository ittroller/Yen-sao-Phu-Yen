<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'sanphams';
	protected $fillable = [
        'tensp',
        'alias',
        'soluong',
        'gia',
        'phantramgiamgia',
        'giachot',
        'anhsp',
        'mota',
        'loaisp_id',
    ];
	public $timestamps = false;

	public function loaisp(){
		return $this->belongTo('App\LoaiSanPham');
	}
	public function anhchitiet(){
		return $this->hasMany('App\AnhSanPham');
	}
}
