<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, DB;
use Hash;
use Session;

use App\Loaisanpham;
use App\Http\Requests\ThemLoaiSanPhamRequest;

class LoaiSanPhamController extends Controller
{
    public function index(){
        return view('backend.trang.loaisanpham.danhsach')->with('loais',Loaisanpham::paginate(10));
    }
    public function create(){
        $id_hientai = Loaisanpham::select('id','tenloai','loai_con')->get()->toArray();
		return view('backend.trang.loaisanpham.them',compact('id_hientai'));
    }
    public function store(ThemLoaiSanPhamRequest $request){
        $loai = new Loaisanpham;
        $loai->tenloai = $request->tenloai;
        $loai->alias = changeTitle($request->tenloai);
        $loai->loai_con = $request->loai;

        $loai->save();

        Session::flash('success','Thêm thành công');

        return redirect()->back();
    }
    public function show($id){
        
    }
    public function edit($id){
        $data = Loaisanpham::findOrFail($id)->toArray();
        $id_hientai = Loaisanpham::select('id','tenloai','loai_con')->get()->toArray();
		return view('backend.trang.loaisanpham.sua',compact('data','id_hientai'));
    }
    public function update(Request $request, $id){
        $loai = Loaisanpham::find($id);
        $loai->tenloai = $request->tenloai;
        $loai->alias = changeTitle($request->tenloai);
		$loai->loai_con 		= $request->loai;
        $loai->save();

        Session::flash('success','Sửa thành công');

        return redirect()->route('backend.loaisp.danhsach');
    }
    public function destroy($id){
        $loai = Loaisanpham::find($id);
        $loai->delete();
        Session::flash('success','Xóa thành công');
        return redirect()->route('backend.loaisp.danhsach');
    }
}
