@extends('backend.master')
@section('trang','Sản Phẩm')
@section('tacvu','Thêm')
@section('content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <div class="box box-primary">
                @include('backend.thongbao.thongbaoloi.loi')
                <form role="form" method="post" enctype="multipart/form-data" action="{!! route('backend.sanpham.luu') !!}">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                    
                    
                    <div class="box-body">
                        <div class="form-group">
                            <label>Chọn Loại</label>
                            <select class="form-control" name="loai" required>
                                <option value="">Chọn Loại (bắt buộc)</option>
                                <?php
                                cate_parent($loai, 0, "", old('loai'));
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTensp">Tên sản phẩm</label>
                            <input type="text" required class="form-control" id="exampleInputTensp" placeholder="Nhập tên sản phẩm" name="tensp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputSoluong">Số lượng</label>
                            <input type="number" required class="form-control" id="exampleInputSoluong" placeholder="Nhập số lượng" name="soluong">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputGia">Giá</label>
                            <input type="number" required class="form-control" id="exampleInputGia" placeholder="Nhập giá" name="gia">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputGiamGia">Phần trăm giảm giá</label>
                            <input type="number" class="form-control" id="exampleInputGiamGia" value="0">
                        </div>
                        <div class="form-group">
                            <label for="mota">Mô tả sản phẩm</label>
                            <textarea id="mota" required name="mota" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh đại diện sản phẩm</label>
                            <input type="file" required id="exampleInputFile" name="anh">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh chi tiết cho sản phẩm</label>

                            @for($i = 1;$i <=5;$i++)
                                <div class="form-group">
                                    <label>Ảnh {!! $i !!}</label>
                                    <input type="file" class="form-control" name="dsanhchitiet[]" />
                                </div>
                            @endfor
                        </div>
                    </div>


                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
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