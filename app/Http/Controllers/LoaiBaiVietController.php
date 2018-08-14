<?php

namespace App\Http\Controllers;

use App\LoaiBaiViet;
use Illuminate\Http\Request;
use App\Http\Requests\ThemLoaiBaiVietRequest;
use Auth, DB;
use Hash;
use Session;

class LoaiBaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.trang.loaibaiviet.danhsach')->with('loais',LoaiBaiViet::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_hientai = LoaiBaiViet::select('id','tenloai','loai_con')->get()->toArray();
        return view('backend.trang.loaibaiviet.them', compact('id_hientai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThemLoaiBaiVietRequest $request)
    {
        $loai = new LoaiBaiViet;
        $loai->tenloai = $request->tenloai;
        $loai->alias = changeTitle($request->tenloai);
        $loai->loai_con = $request->loai_con;

        if($loai->save()){
            Session::flash('success','Thêm thành công');
            return redirect()->back();
        }else{
            Session::flash('error','Thêm thất bại');
            return redirect()->back();
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LoaiBaiViet  $loaiBaiViet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LoaiBaiViet  $loaiBaiViet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_hientai = LoaiBaiViet::select('id','tenloai','loai_con')->get()->toArray();
        $data = LoaiBaiViet::findOrFail($id)->toArray();
         return view('backend.trang.loaibaiviet.sua',compact('data','id_hientai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LoaiBaiViet  $loaiBaiViet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $loai = LoaiBaiViet::find($id);
        $loai->tenloai = $request->tenloai;
        $loai->alias = changeTitle($request->tenloai);
        $loai->loai_con 		= $request->loai_con;
        if($loai->save()){
            Session::flash('success','Sửa thành công');
            return redirect()->back();
        }else{
            Session::flash('error','Sửa thất bại');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LoaiBaiViet  $loaiBaiViet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loai = LoaiBaiViet::find($id);

        if($loai->delete()){
            Session::flash('success','Xóa thành công');
            return redirect()->back();
        }else{
            Session::flash('error','Xóa thất bại');
            return redirect()->back();
        }
    }
}
