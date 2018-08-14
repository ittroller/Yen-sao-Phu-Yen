<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request; // request để dùng ajax

use App\LoaiSanPham;
use App\SanPham;
use App\AnhSanPham;


use App\Http\Requests\ThemSanPhamRequest;
use App\Http\Requests\LuuSanPhamRequest;

use Auth;
use Session;
use File;
use Illuminate\Support\Facades\Input;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sp = Sanpham::select('*')->orderBy('id','DESC')->paginate(10);
        return view('backend.trang.sanpham.danhsach',compact('sp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loai = Loaisanpham::select('id','tenloai','loai_con')->get()->toArray();
		return view('backend.trang.sanpham.them',compact('loai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // if($request->phantramgiamgia==''){
    //     $sp->phantramgiamgia = 0;
    // }else{
    //     $sp->phantramgiamgia = $request->phantramgiamgia;
    // }
    public function store(ThemSanPhamRequest $request)
    {
        $sp = new Sanpham;
        $sp->tensp = $request->tensp;
        $sp->alias = changeTitle($request->tensp);
        $sp->soluong = $request->soluong;
        $sp->gia = $request->gia;
        $sp->phantramgiamgia = $request->phantramgiamgia;
        $sp->giachot = $request->gia - (($request->gia * $request->phantramgiamgia)/100);
        $sp->mota = $request->mota;
        $sp->loaisp_id = $request->loai;

        $tenanhchinh = $request->file('anh')->getClientOriginalName();
        $request->file('anh')->move('upload/anhsanpham/',$tenanhchinh);
        $sp->anhsp = changeTitle($tenanhchinh);
        $sp->save();

        $id_sp = $sp->id;
        if(Input::hasFile('dsanhchitiet')){
            foreach(Input::file('dsanhchitiet') as $file){
                $anh_chitiet= new AnhSanPham();
                if(isset($file)){
                    $anh_chitiet->anhchitiet=changeTitle($file->getClientOriginalName());
                    $anh_chitiet->sanpham_id=$id_sp;
                    $file->move('upload/anhsanpham/anhchitietsanpham/',changeTitle($file->getClientOriginalName()));
                    $anh_chitiet->save();
                }
            }
        }
        Session::flash('success','Thêm sản phẩm thành công');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sp = SanPham::findOrFail($id)->toArray();
        return view('backend.trang.sanpham.xemchitiet',compact('sp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loai = LoaiSanPham::select('id','tenloai','loai_con')->get()->toArray();
        $sp = SanPham::find($id);
        $anhchitiet = AnhSanPham::select('*')->where('sanpham_id',$id)->get()->toArray();
        return view('backend.trang.sanpham.sua',compact('loai','sp','anhchitiet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LuuSanPhamRequest $request, $id)
    {
        $sp = SanPham::find($id);
        $sp->tensp = $request->tensp;
        $sp->alias = changeTitle($request->tensp);
        $sp->soluong = $request->soluong;
        $sp->gia = $request->gia;
        $sp->phantramgiamgia = $request->phantramgiamgia;
        $sp->giachot = $request->gia - (($request->gia * $request->phantramgiamgia)/100);
        $sp->mota = $request->mota;
        $sp->loaisp_id = $request->loai;

        $anhcu = 'upload/anhsanpham/'.Request::input('anhcu');
        if(!empty(Request::file('anhchinh'))){
            $tenfile = Request::file('anhchinh')->getClientOriginalName();
            $sp->anhsp = changeTitle($tenfile);
            Request::file('anhchinh')->move('upload/anhsanpham/',changeTitle($tenfile));
            if(File::exists($anhcu)){
                File::delete($anhcu);
            }
        }elseif(empty(Request::file('anhchinh')) && !empty(Request::file('anhcu'))){
            $tenfilecu = Request::file('anhcu')->getClientOriginalName();
            $sp->anhsp = changeTitle($tenfilecu);
        }
        $sp->save();


        // thêm ảnh chi tiết mới
        if(!empty(Request::file('fEditDetail'))){
            foreach (Request::file('fEditDetail') as $file) {
                $anhchitiet = new AnhSanPham();
                if(isset($file)){
                    $anhchitiet->anhchitiet = changeTitle($file->getClientOriginalName());
                    $anhchitiet->sanpham_id = $id;
                    $file->move('upload/anhsanpham/anhchitietsanpham/',changeTitle($file->getClientOriginalName()));
                    $anhchitiet->save();
                }
            }
        }

        Session::flash('success','Sửa Sản Phẩm Thành công');

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
        $anhchitiet = AnhSanPham::select('*')->where('sanpham_id',$id)->get()->toArray();
        foreach ($anhchitiet as $value) {
            File::delete('upload/anhsanpham/anhchitietsanpham/'.$value["anhchitiet"]);
        }
        $sp = SanPham::find($id);
        File::delete('upload/anhsanpham/'.$sp->anh);
        $sp->delete($id);

        Session::flash('success','Xóa Sản Phẩm Thành công');

        return redirect()->back();
    }
    public function xoaanh($id){
        if(Request::ajax()){
            $idHinh = (int)Request::get('idHinh');
            $image_detail = AnhSanPham::find($idHinh);
            if(!empty($image_detail)){
                $img = '/upload/anhsanpham/anhchitietsanpham/'.$image_detail->anhchitiet;
                // xóa luôn trong source
                unlink('upload/anhsanpham/anhchitietsanpham/'.$image_detail->anhchitiet);
                if(File::exists($img)){
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "OK";
        }
    }
}
