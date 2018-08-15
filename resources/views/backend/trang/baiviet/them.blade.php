@extends('backend.master')
@section('trang','Bài viết')
@section('tacvu','Thêm')
@section('content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <div class="box box-primary">
                @include('backend.thongbao.thongbaoloi.loi')
                <form role="form" method="post" enctype="multipart/form-data" action="{!! route('backend.baiviet.luu') !!}">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                    
                    <div class="box-body">
                        <div class="form-group">
                            <label for="LoaiBaiViet">Chọn loại bài viết</label>
                            <select name="loaibv_id" required id="LoaiBaiViet" class="form-control">
                                <option>Chọn loại bài viết</option>
                                @foreach($loai as $item)
                                    <option value="{{$item['id']}}">{{$item['tenloai']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTenBv">Tiêu đề bài viết</label>
                            <input type="text" required class="form-control" id="exampleInputTenBv" placeholder="Nhập tiêu đề bài viết" name="tieude">
                        </div>
                        <div class="form-group">
                            <label for="ckeditor">Nội dung bài viết</label>
                            <textarea id="ckeditor" required name="noidung" rows="10" class="form-control"></textarea>
                            <script>CKEDITOR.replace('ckeditor');</script>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh đại diện bài viết</label>
                            <input type="file" id="exampleInputFile" name="anh">
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