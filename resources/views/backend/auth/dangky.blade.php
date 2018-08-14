@extends('backend.auth.master')
@section('content')
<div class="register-box">
        <div class="register-logo">
          <a><b>Admin</b>LTE</a>
        </div>
      
        <div class="register-box-body">
          <p class="login-box-msg">Đăng ký tài khoản</p>
          @include('backend.thongbao.thongbaoloi.loi')
          <form action="{!! route('postDangky') !!}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
            <div class="form-group has-feedback">
              <input type="text" required class="form-control" placeholder="Họ tên đầy đủ" name="hoten">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="email" required class="form-control" placeholder="Email" name="email">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" required class="form-control" placeholder="Mật khẩu" name="matkhau">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Ảnh đại diện</label>
                <input type="file" id="exampleInputFile" name="anhdaidien">
            </div>
            <div class="form-group has-feedback">
                <input type="text" required class="form-control" placeholder="Địa chỉ" name="diachi">
                <span class="glyphicon glyphicon-home form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="number" required class="form-control" placeholder="Số điện thoại" name="sdt">
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>
            <div class="form-group">
                <label>Quyền hạn</label>
                <select class="form-control" name="quyen">
                    <option value="0">Quản trị viên</option>
                    <option value="1">Người dùng</option>
                </select>
            </div>

            <div class="row">
              <div class="col-xs-8">
                {{-- <div class="checkbox icheck">
                  <label>
                    <input type="checkbox"> I agree to the <a href="#">terms</a>
                  </label>
                </div> --}}
              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng ký</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
      
          <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat">
                <i class="fa fa-facebook"></i>
                Đăng ký bằng Facebook
            </a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat">
                <i class="fa fa-google-plus"></i>
                Đăng ký bằng Google+
            </a>
          </div>
      
          <a href="{{route('getDangnhap')}}" class="text-center">Bạn đã có tài khoản</a>
        </div>
        <!-- /.form-box -->
      </div>
      <!-- /.register-box -->
@endsection