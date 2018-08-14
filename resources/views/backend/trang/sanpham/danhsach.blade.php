@extends('backend.master')
@section('trang','Sản phẩm')
@section('tacvu','Danh sách')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách sản phẩm</h3>

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

            @if(count($sp)>0)

            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>STT</th>
                  <th>Tên sản phẩm</th>
                  <th>Số lượng</th>
                  <th>Giá</th>
                  <th>Thuộc loại</th>
                  <th>Xem</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
                </tr>
                <?php $stt = 0; ?>
                @foreach($sp as $item)
                <?php $stt = $stt + 1; ?>
                <tr>
                  <td>{{ $stt }}</td>
                  <td>{{ $item->tensp }}</td>
                  <td>{{ $item->soluong }}</td>
                  <td>{{ $item->gia }}</td>
                  <td>
                    @if($item->loaisp_id != null)
                        <?php
                            $l = DB::table('loaisanphams')->select('tenloai')->where('id','=',$item->loaisp_id)->get();
                            foreach($l as $i){
                                echo $i->tenloai;
                            }
                        ?>
                    @endif
                  </td>
                  <td>
                    <a href="{{route('backend.sanpham.xem',['id'=>$item->id])}}"><i class="fa fa-fw fa-search-plus"></i></a>
                  </td>
                  <td>
                      <a href="{{route('backend.sanpham.sua',['id'=>$item->id])}}"><i class="fa fa-fw fa-edit"></i></a>
                  </td>
                  <td>
                    <a onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa ?');" href="{{route('backend.sanpham.xoa',['id'=>$item->id])}}"><i class="fa fa-fw fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            
            {{ $sp->links() }}

            @else
              <h2><i>Không có sản phẩm nào trong danh sách</i></h2>
            @endif

          </div>
          <!-- /.box -->
        </div>
      </div>
</section>

@endsection

@include('backend.master.pagescript')