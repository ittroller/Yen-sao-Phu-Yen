@extends('backend.master')
@section('content')

        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
              <div class="col-lg-4 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>
                        {{ $loaisp }}
                      </h3>
        
                      <p>Loại Sản Phẩm</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">Xem danh sách <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{ $sanpham }}</h3>
    
                  <p>Sản Phẩm</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Xem danh sách <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$nguoidung}}</h3>
    
                  <p>Người Dùng</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Xem danh sách <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{$loaibv}}</h3>
    
                  <p>Loại Bài Viết</p>
                </div>
                <div class="icon">
                  <i class="ion ion-md-clipboard"></i>
                </div>
                <a href="#" class="small-box-footer">Xem danh sách <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-black">
                  <div class="inner">
                    <h3>{{$baiviet}}</h3>
      
                    <p>Bài Viết</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-md-paper"></i>
                  </div>
                  <a href="#" class="small-box-footer">Xem danh sách <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-purple">
                    <div class="inner">
                      <h3>Đang cập nhật</h3>
        
                      <p>Hóa Đơn</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-md-gift"></i>
                    </div>
                    <a href="#" class="small-box-footer">Xem danh sách <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">

              
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">
    
              <!-- Calendar -->
              <div class="box box-solid bg-green-gradient">
                <div class="box-header">
                  <i class="fa fa-calendar"></i>
    
                  <h3 class="box-title">Xem lịch</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <!-- button with a dropdown -->
                    <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                  <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <!--The calendar -->
                  <div id="calendar" style="width: 100%"></div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
    
            </section>
            <!-- /.Left col -->
            <section class="col-lg-7 connectedSortable">
              </section>
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
    
        </section>
        <!-- /.content -->

@endsection
@include('backend.master.pagescript')