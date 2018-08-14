@extends('backend.master')
@section('trang','Loại sản Phẩm')
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
                            <label>Chọn loại sản phẩm</label>
                            <select class="form-control" name="loai">
                                <option value="0">Chọn Loại (nếu muốn)</option>
                                <?php cate_parent($id_hientai); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLoaisp">Tên loại sản phẩm</label>
                            <input type="text" required class="form-control" id="exampleInputLoaisp" value="{!! old('tenloai',isset($data) ? $data['tenloai'] : null) !!}" name="tenloai">
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