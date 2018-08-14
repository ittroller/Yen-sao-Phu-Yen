@extends('backend.master')
@section('trang','Loại sản phẩm')
@section('tacvu','Danh sách')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách loại sản phẩm</h3>

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
                  <th>Tên loại sản phẩm</th>
                  <th>Thuộc loại</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
                </tr>
                <?php $stt = 0; ?>
                @foreach($loais as $loai)
                <?php $stt = $stt + 1; ?>
                <tr>
                  <td>{{ $stt }}</td>
                  <td>{{ $loai->tenloai }}</td>
                  <td>
                    @if($loai->loai_con != null)
                        <?php
                            $l = DB::table('loaisanphams')->select('tenloai')->where('id','=',$loai->loai_con)->get();
                            foreach($l as $i){
                                echo $i->tenloai;
                            }
                        ?>
                    @else
                        {{ 'Không thuộc loại nào' }}
                    @endif
                  </td>
                  <td>
                      <a href="{{route('backend.loaisp.sua',['id'=>$loai->id])}}"><i class="fa fa-fw fa-edit"></i></a>
                  </td>
                  <td>
                    <a onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa loại sản phẩm này?');" href="{{route('backend.loaisp.xoa',['id'=>$loai->id])}}"><i class="fa fa-fw fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            
            {{ $loais->links() }}

          </div>
          <!-- /.box -->
        </div>
      </div>
</section>

@endsection

@include('backend.master.pagescript')