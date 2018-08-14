@extends('backend.master')
@section('trang','Bài viết')
@section('tacvu','Chi tiết bài viết')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
                <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Chi tiết bài viết</h3>
                          <hr>
                          <a href="{{ route('backend.baiviet.danhsach') }}">Trở lại Danh sách bài viết</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                          <table class="table table-condensed">
                                <tr>
                                    <th>Tiêu đề bài viết</th>
                                    <td>{!! $bv['tieude'] !!}</td>
                                </tr>
                                <tr>
                                    <th>Nội dung</th>
                                    <td>
                                        {!! $bv['noidung'] !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Số lượt xem</th>
                                    <td>{!! $bv['luotxem'] !!} lượt xem</td>
                                </tr>
                                <tr>
                                    <th>Loại bài viết</th>
                                    <?php
                                        $loai = DB::table('loaibaiviets')->where('id', $bv['loaibv_id'])->get();
                                        $tenloai = "";
                                        foreach($loai as $item){
                                            $tenloai = $item->tenloai;
                                        }
                                    ?>
                                    <td>{!! $tenloai !!}</td>
                                </tr>
                                <tr>
                                    <th>Người viết</th>
                                    <?php
                                        $loai = DB::table('users')->where('id', $bv['tacgia_id'])->get();
                                        $tacgia = "";
                                        foreach($loai as $item){
                                            $tacgia = $item->hoten;
                                        }
                                    ?>
                                    <td>{!! $tacgia !!}</td>
                                </tr>
                                <tr>
                                    <th>Ảnh đại diện bài viết</th>
                                    <td>
                                        <img height="200" width="200" src="{!! asset('upload/anhbaiviet/'.$bv['anhdaidien']) !!}" />
                                    </td>
                                </tr>
                                <tr>
                                    <th><a class="btn btn-primary" href="{{route('backend.baiviet.sua',['id'=>$bv['id']])}}">Sửa</a></th>
                                    <td> </td>
                                </tr>
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
          <!-- /.box -->
        </div>
      </div>
</section>

@endsection

@include('backend.master.pagescript')