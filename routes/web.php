<?php

use Carbon\Carbon;
// use Hash;


Auth::routes();
Route::get('login',['as'=>'login','uses'=>'MasterController@getDangnhap']);
Route::get('register',['as'=>'register','uses'=>'MasterController@getDangky']);
/* FADE LOGIN WITH AUTH */


Route::get('dangnhap',['as'=>'getDangnhap','uses'=>'MasterController@getDangnhap']);
Route::post('dangnhap',['as'=>'postDangnhap','uses'=>'MasterController@postDangnhap']);
Route::get('dangky',['as'=>'getDangky','uses'=>'MasterController@getDangky']);
Route::post('dangky',['as'=>'postDangky','uses'=>'MasterController@postDangky']);
Route::get('logout',['as'=>'logout','uses'=>'MasterController@logout']);


Route::get('/', function () {
    // $now = Carbon::now()->hour;
    
    // $now = Carbon::now('Asia/Ho_Chi_Minh')->format('s:i:h d/m/Y');
    // $now->setTimezone('UTC +7');


    // date_default_timezone_set("Asia/Ho_Chi_Minh");
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    // $date = getdate();
    $s = getStringTime(getdate());
    $string = bcrypt($s);
    return view('welcome')->with('baygio',$string);
});


// Route::group(['prefix'=>'backend'/*,'middleware'=>'auth' */],function(){

Route::group(['prefix'=>'backend','middleware'=>'auth' ],function(){
    /*------------------------------- Trang quản trị------------------------------------------------*/
    Route::get('/trang-quan-tri', ['uses'=>'NguoidungController@trangquantri','as'=>'backend.trangquantri']);

    /*------------------------------- Người dùng------------------------------------------------*/
    Route::group(['prefix'=>'nguoi-dung'], function(){
        Route::get('/trang-ca-nhan', ['uses'=>'NguoidungController@show','as'=>'backend.nguoidung.trangcanhan']);
        Route::get('/danh-sach', ['uses'=>'NguoidungController@index','as'=>'backend.nguoidung.danhsach'])->middleware('admin');
        Route::get('/them', ['uses'=>'NguoidungController@create','as'=>'backend.nguoidung.them'])->middleware('admin');
        Route::post('/them', ['uses'=>'NguoidungController@store','as'=>'backend.nguoidung.luu'])->middleware('admin');
        Route::get('/sua/{id}', ['uses'=>'NguoidungController@edit','as'=>'backend.nguoidung.sua']);
        Route::post('/sua/{id}', ['uses'=>'NguoidungController@update','as'=>'backend.nguoidung.capnhat']);
        Route::get('/xoa/{id}', ['uses'=>'NguoidungController@destroy','as'=>'backend.nguoidung.xoa'])->middleware('admin');
    });

    /*------------------------------- Loại sản phẩm------------------------------------------------*/
    Route::group(['prefix'=>'loai-san-pham'],function(){
        Route::get('/danh-sach',['uses'=>'LoaiSanPhamController@index','as'=>'backend.loaisp.danhsach'])->middleware('admin');
        Route::get('/them',['uses'=>'LoaiSanPhamController@create','as'=>'backend.loaisp.them'])->middleware('admin');
        Route::post('/them',['uses'=>'LoaiSanPhamController@store','as'=>'backend.loaisp.luu'])->middleware('admin');
        Route::get('/sua/{id}',['uses'=>'LoaiSanPhamController@edit','as'=>'backend.loaisp.sua'])->middleware('admin');
        Route::post('/sua/{id}',['uses'=>'LoaiSanPhamController@update','as'=>'backend.loaisp.capnhat'])->middleware('admin');
        Route::get('/xoa/{id}',['uses'=>'LoaiSanPhamController@destroy','as'=>'backend.loaisp.xoa'])->middleware('admin');
    });

    /*------------------------------- Sản phẩm------------------------------------------------*/
    Route::group(['prefix'=>'san-pham'],function(){
        Route::get('/danh-sach',['uses'=>'SanPhamController@index','as'=>'backend.sanpham.danhsach'])->middleware('admin');
        Route::get('/them',['uses'=>'SanPhamController@create','as'=>'backend.sanpham.them'])->middleware('admin');
        Route::post('/them',['uses'=>'SanPhamController@store','as'=>'backend.sanpham.luu'])->middleware('admin');
        Route::get('/xem/{id}',['uses'=>'SanPhamController@show','as'=>'backend.sanpham.xem'])->middleware('admin');
        Route::get('/sua/{id}',['uses'=>'SanPhamController@edit','as'=>'backend.sanpham.sua'])->middleware('admin');
        Route::post('/sua/{id}',['uses'=>'SanPhamController@update','as'=>'backend.sanpham.capnhat'])->middleware('admin');
        Route::get('/xoa/{id}',['uses'=>'SanPhamController@destroy','as'=>'backend.sanpham.xoa'])->middleware('admin');

        Route::get('xoaanh/{id}',['as'=>'admin.sanpham.xoaanh','uses'=>'SanPhamController@xoaanh'])->middleware('admin');
    });
    /*------------------------------- Loại bài viết ------------------------------------------------*/
    Route::group(['prefix'=>'loai-bai-viet'],function(){
        Route::get('/danh-sach',['uses'=>'LoaiBaiVietController@index','as'=>'backend.loaibv.danhsach'])->middleware('admin');
        Route::get('/them',['uses'=>'LoaiBaiVietController@create','as'=>'backend.loaibv.them'])->middleware('admin');
        Route::post('/them',['uses'=>'LoaiBaiVietController@store','as'=>'backend.loaibv.luu'])->middleware('admin');
        Route::get('/sua/{id}',['uses'=>'LoaiBaiVietController@edit','as'=>'backend.loaibv.sua'])->middleware('admin');
        Route::post('/sua/{id}',['uses'=>'LoaiBaiVietController@update','as'=>'backend.loaibv.capnhat'])->middleware('admin');
        Route::get('/xoa/{id}',['uses'=>'LoaiBaiVietController@destroy','as'=>'backend.loaibv.xoa'])->middleware('admin');
    });
    /*------------------------------- Bài viết ------------------------------------------------*/
    Route::group(['prefix'=>'bai-viet'],function(){
        Route::get('/danh-sach',['uses'=>'BaiVietController@index','as'=>'backend.baiviet.danhsach']);
        Route::get('/them',['uses'=>'BaiVietController@create','as'=>'backend.baiviet.them']);
        Route::post('/them',['uses'=>'BaiVietController@store','as'=>'backend.baiviet.luu']);
        Route::get('/xem/{id}',['uses'=>'BaiVietController@show','as'=>'backend.baiviet.xem'])->middleware('filterview');
        Route::get('/sua/{id}',['uses'=>'BaiVietController@edit','as'=>'backend.baiviet.sua'])->middleware('admin');
        Route::post('/sua/{id}',['uses'=>'BaiVietController@update','as'=>'backend.baiviet.capnhat'])->middleware('admin');
        Route::get('/xoa/{id}',['uses'=>'BaiVietController@destroy','as'=>'backend.baiviet.xoa'])->middleware('admin');
    });
});