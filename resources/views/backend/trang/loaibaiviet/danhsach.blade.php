@extends('backend.master')
@section('trang','Loại bài viết')
@section('tacvu','Danh sách')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách loại bài viết</h3>
            </div>
            <!-- /.box-header -->
            @if(count($loais)>0)
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>STT</th>
                  <th>Tên loại bài viết</th>
                  <th>Thuộc loại bài viết</th>
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
                    @if($loai->loai_con > 0)
                        <?php
                            $l = DB::table('loaibaiviets')->select('tenloai')->where('id','=',$loai->loai_con)->get();
                            foreach($l as $i){
                                echo $i->tenloai;
                            }
                        ?>
                    @else
                        <?php echo 'Không thuộc loại nào'; ?>
                    @endif
                  </td>
                  <td>
                      <a href="{{route('backend.loaibv.sua',['id'=>$loai->id])}}"><i class="fa fa-fw fa-edit"></i></a>
                  </td>
                  <td>
                    <a onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa loại bài viết này ?');" href="{{route('backend.loaibv.xoa',['id'=>$loai->id])}}"><i class="fa fa-fw fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            
            {{ $loais->links() }}

            @else
                <h2><i>Không có loại bài viết nào</i></h2>
            @endif

          </div>
          <!-- /.box -->
        </div>
      </div>
</section>

@endsection

@include('backend.master.pagescript')