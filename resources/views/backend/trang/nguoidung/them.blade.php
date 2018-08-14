@extends('backend.master')
@section('trang','Người dùng')
@section('tacvu','Thêm')
@section('content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <div class="box box-primary">
                @include('backend.thongbao.thongbaoloi.loi')
                <form role="form" method="post" enctype="multipart/form-data" action="{!! route('backend.nguoidung.luu') !!}">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ tên</label>
                            <input type="text" required class="form-control" id="exampleInputEmail1" placeholder="Nhập họ tên" name="hoten">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" required class="form-control" id="exampleInputEmail1" placeholder="Nhập email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" required class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu" name="matkhau">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="exampleInputFile" name="anhdaidien">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" required class="form-control" id="exampleInputEmail1" placeholder="Nhập địa chỉ" name="diachi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="number" required class="form-control" id="exampleInputEmail1" placeholder="Nhập số điện thoại" name="sdt">
                        </div>
                        <div class="form-group">
                        <label>Quyền</label>
                            <select class="form-control" name="quyen">
                                <option value="0">Quản trị viên</option>
                                <option value="1">Người dùng</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->

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