<?php

namespace App\Http\Controllers;

use App\BaiViet;
use App\LoaiBaiViet;
use Auth;
use Session;
use File, Hash;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Input;
use App\Http\Requests\ThemBaiVietRequest;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bv = BaiViet::select('*')->orderBy('id','DESC')->paginate(10);
        return view('backend.trang.baiviet.danhsach',compact('bv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loai = LoaiBaiViet::select('*')->get()->toArray();
		return view('backend.trang.baiviet.them',compact('loai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThemBaiVietRequest $request)
    {

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = getStringTime(getdate());
        $mahoa = Hash::make($date);

        $bv = new BaiViet;
        $bv->tieude = $request->tieude;
        $bv->alias = changeTitle($request->tieude)."-".substr(changeTitle($mahoa),-10,12);
        $bv->noidung = $request->noidung;
        $bv->loaibv_id = $request->loaibv_id;
        $bv->tacgia_id = Auth::id();

        if(empty($request->file('anh'))){
            $bv->anhdaidien = '';
        }else{
            $tenanh = $request->file('anh')->getClientOriginalName();
            $request->file('anh')->move('upload/anhbaiviet/',$tenanh);
            $bv->anhdaidien = $tenanh;
        }
        if($bv->save()){
            Session::flash('success','Thêm bài viết thành công');
            return redirect()->back();
        }else{
            Session::flash('error','Thêm thất bại');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bv = BaiViet::findOrFail($id)->toArray();
        Event::fire('bv.show', $post);
		return view('backend.trang.baiviet.xemchitiet',compact('bv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaibv = LoaiBaiViet::select('id','tenloai','loai_con')->get()->toArray();
        $baiviet = BaiViet::find($id);

        return view('backend.trang.baiviet.sua',compact('loaibv','baiviet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function update(ThemBaiVietRequest $request, $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = getStringTime(getdate());
        $mahoa = Hash::make($date);

        $bv = BaiViet::findOrFail($id);
        $bv->tieude = $request->tieude;
        $bv->alias = changeTitle($request->tieude)."-".substr(changeTitle($mahoa),-10,12);
        $bv->noidung = $request->noidung;
        $bv->loaibv_id = $request->loai;
        $bv->tacgia_id = Auth::id();

        $anhcu = 'upload/anhbaiviet/'.$request->anhcu;

        if(!empty($request->file('anhmoi'))){
            $tenfile = $request->anhmoi->getClientOriginalName();
            $bv->anhdaidien = changeTitle($tenfile);
            $request->anhmoi->move('upload/anhbaiviet/',changeTitle($tenfile));
            if(File::exists($anhcu)){
                File::delete($anhcu);
            }
        }elseif(empty($request->file('anhmoi'))){
            if($request->file('anhcu')==''){
                $bv->anhdaidien = '';
            }else{
                $tenfilecu = $request->anhcu->getClientOriginalName();
                $bv->anhdaidien = changeTitle($tenfilecu);
            }
        }
        if($bv->save()){
            Session::flash('success','Thêm bài viết thành công');
            return redirect()->back();
        }else{
            Session::flash('error','Thêm thất bại');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bv = BaiViet::findorFail($id);

        File::delete('upload/anhbaiviet/'.$bv->anhdaidien);
        $bv->delete($id);

        Session::flash('success','Xóa bài viết Thành công');

        return redirect()->back();
    }
}
