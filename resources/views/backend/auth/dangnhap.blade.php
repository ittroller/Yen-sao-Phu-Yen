@extends('backend.auth.master')
@section('content')
		<div class="login-box">
		  <div class="login-logo">
			<a><b>Admin</b>LTE</a>
		  </div>
		  <div class="login-box-body">
			<p class="login-box-msg">Đăng nhập vào hệ thống</p>
			@include('backend.thongbao.thongbaoloi.loi')


				<form action="{{route('postDangnhap')}}" method="post">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
					<div class="form-group has-feedback">
						<input type="email" class="form-control" placeholder="Email" name="email">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" placeholder="Mật Khẩu" name="matkhau">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-8">
						</div>
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
						</div>
					</div>
				</form>


			<div class="social-auth-links text-center">
			  	<p>- OR -</p>
			  	<a href="#" class="btn btn-block btn-social btn-facebook btn-flat">
				  <i class="fa fa-facebook"></i>
				  Đăng nhập bằng Facebook
				</a>
			  	<a href="#" class="btn btn-block btn-social btn-google btn-flat">
				  <i class="fa fa-google-plus"></i>
				  Đăng nhập bằng Google+
				</a>
			</div>        
			<a href="#">Bạn quên mật khẩu ?</a><br>
			<a href="{{route('getDangky')}}" class="text-center">Đăng ký tài khoản mới</a>
		  </div>
		</div>
@endsection