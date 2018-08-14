@extends('backend.master')
@section('trang','Sản phẩm')
@section('tacvu','Chi tiết sản phẩm')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
                <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Thông tin của sản phẩm</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                          <table class="table table-condensed">
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <td>{!! $sp['tensp'] !!}</td>
                                </tr>
                                <tr>
                                    <th>Số lượng</th>
                                    <td>{!! $sp['soluong'] !!}</td>
                                </tr>
                                <tr>
                                    <th>Giá</th>
                                    <td>{!! $sp['gia'] !!} VNĐ</td>
                                </tr>
                                <tr>
                                    <th>Phần trăm giảm giá</th>
                                    <td>{!! $sp['phantramgiamgia'] !!} %</td>
                                </tr>
                                <tr>
                                    <th>Mô tả</th>
                                    <td>{!! $sp['mota'] !!}</td>
                                </tr>
                                <tr>
                                    <th>Thuộc loại</th>
                                    <?php
                                        $loai = DB::table('loaisanphams')->where('id', $sp['loaisp_id'])->get();
                                        $tenloai = "";
                                        foreach($loai as $x){
                                            $tenloai = $x->tenloai;
                                        }
                                    ?>
                                    <td>{!! $tenloai !!}</td>
                                </tr>
                                <tr>
                                    <th>Ảnh sản phẩm</th>
                                    <td>
                                        <img height="200" width="200" src="{!! asset('upload/anhsanpham/'.$sp['anhsp']) !!}" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>Ảnh ch tiết sản phẩm</th>
                                    <td>
                                        <?php
                                            $listanh = DB::table('anhsanphams')->where('sanpham_id','=',$sp['id'])->get()->toArray();
                                            foreach($listanh as $a){
                                        ?>
                                        <img height="200" width="200" src="{!! asset('upload/anhsanpham/anhchitietsanpham/'.$a->anhchitiet) !!}" />
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><a class="btn btn-primary" href="{{route('backend.sanpham.sua',['id'=>$sp['id']])}}">Sửa</a></th>
                                    <td> </td>
                                </tr>
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