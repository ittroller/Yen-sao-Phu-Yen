@extends('backend.master')
@section('trang','Người dùng')
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
                            <label for="exampleInputEmail1">Họ tên</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập họ tên" value="{!! old('hoten',isset($user) ? $user['hoten'] : null) !!}" name="hoten">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập email" value="{!! old('email',isset($user) ? $user['email'] : null) !!}" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu mới hoặc giữ nguyên mật khẩu cũ" name="password">
                            <input type="password" hidden name="oldpassword" value="{!! old('password',isset($user) ? $user['password'] : null) !!}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh đại diện</label>
                            <input type="file" id="exampleInputFile" name="anhdaidien">
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh đại diện cũ</label>
                            <input type="text" name="anhdaidiencu" hidden value="{!! old('anhdaidien',isset($user) ? $user['anhdaidien'] : null) !!}">
                            <img height="200" width="200" src="{!! asset('upload/'.$user['anhdaidien']) !!}" alt="Sai URL hoặc ko có ảnh">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập địa chỉ" value="{!! old('diachi',isset($user) ? $user['diachi'] : null) !!}" name="diachi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="number" class="form-control" id="exampleInputPhone1" placeholder="Nhập số điện thoại" value="{!! old('sdt',isset($user) ? $user['sdt'] : null) !!}" name="sdt">
                        </div>
                        {{-- @if($user['id'] == 1 && $user['quyen']==0) --}}
                            <div class="form-group">
                                <label>Quyền</label>
                                <select class="form-control" name="quyen">
                                    @if($user['quyen']==0)
                                        <option value="0" selected>Quản trị viên</option>
                                        <option value="1">Người dùng</option>
                                    @else
                                        <option value="0">Quản trị viên</option>
                                        <option value="1" selected>Người dùng</option>
                                    @endif
                                </select>
                            </div>
                        {{-- @else
                        @endif --}}
                    </div>
                    <!-- /.box-body -->

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