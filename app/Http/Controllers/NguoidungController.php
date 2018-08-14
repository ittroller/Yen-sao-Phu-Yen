<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, DB;
use Hash;
use Session;


use App\User;
use App\LoaiSanPham;
use App\SanPham;
use App\LoaiBaiViet;
use App\BaiViet;
use App\Http\Requests\ThemNguoiDungRequest;

class NguoidungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trangquantri(){
        // $nguoidung = User::all()->count();
        // $loaisp = LoaiSanPham::all()->count();
        // $sanpham = SanPham::all()->count();
        // $loaibv = LoaiBaiViet::all()->count();
        // $baiviet = BaiViet::all()->count();
        return view('backend.trangquantri')
                    ->with('nguoidung',User::all()->count())
                    ->with('loaisp',LoaiSanPham::all()->count())
                    ->with('sanpham',SanPham::all()->count())
                    ->with('loaibv',LoaiBaiViet::all()->count())
                    ->with('baiviet',BaiViet::all()->count());
    }
    
    public function index()
    {

        return view('backend.trang.nguoidung.danhsach')->with('users',User::all());;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.trang.nguoidung.them');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThemNguoiDungRequest $request)
    {
        $user = new User;
        $user->hoten = $request->hoten;
        $user->email = $request->email;
        $user->sdt = $request->sdt;
        $user->password = Hash::make($request->matkhau);
        $user->diachi = $request->diachi;
        $user->quyen = $request->quyen;

        if ($request->hasFile('anhdaidien')) {
            $file_name = $request->file('anhdaidien')->getClientOriginalName();// hàm lấy tên tấm hình
            $user->anhdaidien = $file_name;
            $request->file('anhdaidien')->move('upload/',$file_name);
        }

        $user->save();

        Session::flash('success','Thêm Thành công');

        return redirect()->route('backend.nguoidung.danhsach');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(Auth::user()){
            return view('backend.trang.nguoidung.trangcanhan')->with('user',Auth::user());
        }else{
            Session::flash('error','Lỗi');
            return redirect()->back();
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->id == $id || Auth::user()->quyen==0){
            $user = User::findOrFail($id)->toArray();
            return view('backend.trang.nguoidung.sua',compact('user','id'));
        }else{
            Session::flash('error','Bạn Không Có Quyền Truy Cập URL này !!');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->hoten = $request->hoten;
        $user->email = $request->email;
        $user->sdt = $request->sdt;

        if($request->password == ''){
            $user->password = $request->oldpassword;
        }else{
            $user->password = Hash::make($request->password);
        }

        $user->diachi = $request->diachi;
        $user->quyen = $request->quyen;

        if ($request->hasFile('anhdaidien') == '') {
            $file_name = $request->anhdaidiencu;
            $user->anhdaidien = $file_name;
        }elseif($request->hasFile('anhdaidien') != '' && $request->hasFile('anhdaidiencu') == ''){
            $file_name = $request->file('anhdaidien')->getClientOriginalName();
            $user->anhdaidien = $file_name;
            unlink('upload/'.$request->anhdaidiencu);
            $request->file('anhdaidien')->move('upload/',$file_name);
        }

        $user->save();

        Session::flash('success','Sửa Thành công');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idnguoidunghientai = Auth::user()->id;
        $user = User::find($id);

        if(($idnguoidunghientai == $user->id) && $user->quyen != 1){
            Session::flash('error','Không thể xóa');
            return redirect()->back();
        }else{
            $user->delete($id);
            unlink('upload/'.$user->anhdaidien);
            Session::flash('success','Xóa thành công');
            return redirect()->route('backend.nguoidung.danhsach');
        }
    }
}
