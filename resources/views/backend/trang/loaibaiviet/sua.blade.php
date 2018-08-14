@extends('backend.master')
@section('trang','Loại bài viết')
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
                            <label>Chọn loại bài viết</label>
                            <select class="form-control" name="loai_con">
                                <option value="0">Không thuộc loại nào</option>
                                <?php cate_parent($id_hientai,0,"-", $data['loai_con']); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLoaibv">Tên loại bài viết</label>
                            <input type="text" required class="form-control" id="exampleInputLoaibv" value="{!! old('tenloai',isset($data) ? $data['tenloai'] : null) !!}" name="tenloai">
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                        <a href="{{ route('backend.loaibv.danhsach') }}" class="btn btn-warning">Quay lại danh sách bài viết</a>
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