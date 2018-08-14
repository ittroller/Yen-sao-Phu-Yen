<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Session;
use Hash;
use Auth;

use App\Http\Requests\DangNhapRequest;
use App\Http\Requests\DangKyRequest;

class MasterController extends Controller
{
    public function getDangnhap(){
        $page = "login-page";
        return view('backend.auth.dangnhap',compact('page'));
    }
    public function postDangnhap(Request $request){
        $email = $request->email;
        $matkhau = $request->matkhau;        

        if(Auth::attempt(['email'=>$email, 'password'=>$matkhau])){
            Session::flash('success',"Đăng nhập thành công");
            return redirect()->route('backend.trangquantri');
        }else{
            Session::flash('error',"Sai");
            return redirect()->back();
        }
    }
    public function getDangky(){
        $page = "register-page";
        return view('backend.auth.dangky',compact('page'));
    }
    public function postDangky(DangKyRequest $request){
        $nguoidung = new User;
        $nguoidung->hoten = $request->hoten;
        $nguoidung->email = $request->email;
        $nguoidung->diachi = $request->diachi;
        $nguoidung->password = Hash::make($request->matkhau);
        $nguoidung->hoten = $request->hoten;
        $nguoidung->sdt = $request->sdt;
        $nguoidung->quyen = $request->quyen;

        if ($request->hasFile('anhdaidien')) {
            $file_name = $request->file('anhdaidien')->getClientOriginalName();// hàm lấy tên tấm hình
            $nguoidung->anhdaidien = $file_name;
            $request->file('anhdaidien')->move('upload/',$file_name);
        }
        $nguoidung->save();
        Auth::login($nguoidung);
        Session::flash('success','Tạo tài khoản thành công');
        return redirect()->route('backend.trangquantri');
    }
    public function logout(){
      Auth::logout();
      $page = "login-page";
      return view('backend.auth.dangnhap',compact('page'));
    }
}
