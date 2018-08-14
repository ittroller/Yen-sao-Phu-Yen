@extends('backend.master')
@section('trang','Người dùng')
@section('tacvu','Trang cá nhân')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
                <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Thông tin của bạn</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                          <table class="table table-condensed">
                                <tr>
                                    <th>Email</th>
                                    <td>{!! $user['email'] !!}</td>
                                </tr>
                                <tr>
                                    <th>Họ Tên</th>
                                    <td>{!! $user['hoten'] !!}</td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại</th>
                                    <td>{!! $user->sdt !!}</td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ</th>
                                    <td>{!! $user['diachi'] !!}</td>
                                </tr>
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
          <!-- /.box -->
        </div>
      </div>

<a class="btn btn-warning" href="{!! route('backend.nguoidung.sua',$user['id']) !!}">Sửa thông tin của bạn</a>
</section>

@endsection

@include('backend.master.pagescript')