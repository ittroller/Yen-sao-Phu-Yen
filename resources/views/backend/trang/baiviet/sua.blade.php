@extends('backend.master')
@section('trang','Bài viết')
@section('tacvu','Sửa')
@section('content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <div class="box box-primary">
                @include('backend.thongbao.thongbaoloi.loi')
                <form role="form" method="post" enctype="multipart/form-data" action="">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                    
                    
                    <div class="box-body">
                        <div class="form-group">
                            <label>Chọn Loại</label>
                            <select class="form-control" name="loai" required>
                                <option value="">Chọn Loại (bắt buộc)</option>
                                <?php
                                    cate_parent($loaibv, 0, " ", $baiviet["loaibv_id"]);
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTensp">Tiêu đề</label>
                            <input type="text" class="form-control" id="exampleInputTensp" value="{!! old('tieude',isset($baiviet) ? $baiviet['tieude'] : null) !!}" name="tieude">
                        </div>

                        <div class="form-group">
                            <label for="noidung">Nội dung</label>
                            <textarea id="noidung" name="noidung" rows="10" class="form-control">{!! old('noidung',isset($baiviet) ? $baiviet['noidung'] : null) !!}</textarea>
                            <script>CKEDITOR.replace('noidung');</script>
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh đại diện cũ của bài viết</label>
                            {{-- link ảnh cũ --}}
                            <input type="text" name="anhcu" hidden value="{!! $baiviet['anhdaidien'] !!}">
                            
                            <img height="200" width="200" src="{!! asset('upload/anhbaiviet/'.$baiviet['anhdaidien']) !!}" />
                            
                            <hr>
                            <label for="exampleInputFile">Đổi/Chọn ảnh đại diện cho bài viết</label>
                            <input type="file" id="exampleInputFile" name="anhmoi">
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
                </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</section>

@endsection

@include('backend.master.pagescript')