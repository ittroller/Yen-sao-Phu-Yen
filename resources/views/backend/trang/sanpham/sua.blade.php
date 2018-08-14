@extends('backend.master')
@section('trang','Sản Phẩm')
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
                                    cate_parent($loai, 0, "", $sp["loaisp_id"]);
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTensp">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="exampleInputTensp" value="{!! old('tensp',isset($sp) ? $sp['tensp'] : null) !!}" name="tensp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputSoluong">Số lượng</label>
                            <input type="number" class="form-control" id="exampleInputSoluong" value="{!! old('soluong',isset($sp) ? $sp['soluong'] : null) !!}" name="soluong">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputGia">Giá</label>
                            <input type="number" class="form-control" id="exampleInputGia" value="{!! old('gia',isset($sp) ? $sp['gia'] : null) !!}" name="gia">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputGiamGia">Phần trăm giảm giá</label>
                            <input type="number" class="form-control" id="exampleInputGiamGia" value="{!! old('gphantramgiamgiaia',isset($sp) ? $sp['phantramgiamgia'] : null) !!}" name="phantramgiamgia">
                        </div>
                        <div class="form-group">
                            <label for="mota">Mô tả sản phẩm</label>
                            <textarea id="mota" name="mota" rows="10" class="form-control">
                                {{ $sp['mota'] }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh đại diện sản phẩm</label>
                            {{-- link ảnh cũ --}}
                            <input type="text" name="anhcu" hidden value="{!! $sp['anhsp'] !!}">
                            
                            <img height="200" width="200" src="{!! asset('upload/anhsanpham/'.$sp['anhsp']) !!}" />
                            
                            <hr>
                            <label for="exampleInputFile">Chọn ảnh đại diện mới sản phẩm</label>
                            <input type="file" id="exampleInputFile" name="anhchinh">
                        </div>

                        <?php //var_dump($anhchitiet); ?>

                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh chi tiết sản phẩm</label>
                            @foreach($anhchitiet as $key => $item)
                                <div class="form-group" id="{!! $key !!}">
                                    <img height="200" width="200" src="{!! asset('upload/anhsanpham/anhchitietsanpham/'.$item['anhchitiet']) !!}" alt="không có hình" class="image_detail" idHinh="{!! $item['id'] !!}" id="{!! $key !!}" />
                                    <a href="" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa ảnh này ?');" type="button" id="del_img_demo" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <button type="button" class="btn btn-primary" id="addImages">Thêm ảnh chi tiết</button>
                        <br><br>
                        <div id="insert"></div>
                        <hr>
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