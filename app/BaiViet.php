<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    protected $table = 'baiviets';
	protected $fillable = ['tieude','anhdaidien','alias','noidung','loaibv_id','tacgia_id'];
	public $timestamps = true;

	public function loaibaiviet(){
		return $this->belongTo('App\LoaiBaiViet');
	}
	public function tacgia(){
		return $this->belongTo('App\User');
	}
    
}
