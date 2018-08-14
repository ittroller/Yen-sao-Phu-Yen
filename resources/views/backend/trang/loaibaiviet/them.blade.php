@extends('backend.master')
@section('trang','Loại bài viết')
@section('tacvu','Thêm')
@section('content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <div class="box box-primary">
                @include('backend.thongbao.thongbaoloi.loi')
                <form role="form" method="post" enctype="multipart/form-data" action="{!! route('backend.loaibv.luu') !!}">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                    
                    
                    <div class="box-body">

                        <div class="form-group">
                            <label>Chọn loại bài viết</label>
                            <select class="form-control" name="loai_con">
                                <option value="0">Chọn Loại (nếu muốn)</option>
                                <?php cate_parent($id_hientai); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLoaibv">Tên loại sản phẩm</label>
                            <input type="text" required class="form-control" id="exampleInputLoaibv" placeholder="Nhập loại bài viết" name="tenloai">
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