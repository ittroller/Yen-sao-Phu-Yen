@extends('backend.master')
@section('trang','Người dùng')
@section('tacvu','Danh sách')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách người dùng</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Họ tên</th>
                  <th>Email</th>
                  <th>SĐT</th>
                  <th>Địa chỉ</th>
                  <th>Quyền</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
                </tr>
                <?php $stt = 0; ?>
                @foreach($users as $user)
                <?php $stt = $stt + 1; ?>
                <tr>
                  <td>{{ $stt }}</td>
                  <td>{{ $user->hoten }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->sdt }}</td>
                  <td>{{ $user->diachi }}</td>
                  <td>
                      @if($user->quyen == 0)
                        <?php echo "Quản trị viên"; ?>
                      @else
                        <?php echo "Người dùng"; ?>
                      @endif
                  </td>
                  <td>
                      <a href="{{route('backend.nguoidung.sua',['id'=>$user->id])}}"><i class="fa fa-fw fa-edit"></i></a>
                  </td>
                  <td>
                    <a onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa người dùng này ?');" href="{{route('backend.nguoidung.xoa',['id'=>$user->id])}}"><i class="fa fa-fw fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</section>

@endsection

@include('backend.master.pagescript')