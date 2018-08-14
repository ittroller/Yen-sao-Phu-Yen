<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">
            <a href="{{ route('backend.trangquantri') }}">
              <i class="fa fa-dashboard"></i> <span>Trang quản trị</span>
            </a>
          </li>
          <li class="treeview">
                <a href="#">
                  <i class="fa fa-user"></i>
                  <span>Người dùng</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('backend.nguoidung.danhsach')}}"><i class="fa fa-circle-o"></i> Danh sách người dùng</a></li>
                    <li><a href="{{route('backend.nguoidung.trangcanhan')}}"><i class="fa fa-circle-o"></i> Thông tin cá nhân</a></li>
                    <li><a href="{{route('backend.nguoidung.them')}}"><i class="fa fa-circle-o"></i> Thêm người dùng</a></li>
                </ul>
          </li>

          <li class="treeview">
            <a href="#">
                <i class="fa fa-archive"></i>
                <span>Loại sản phẩm</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('backend.loaisp.danhsach')}}"><i class="fa fa-circle-o"></i> Danh sách loại sản phẩm</a></li>
                <li><a href="{{route('backend.loaisp.them')}}"><i class="fa fa-circle-o"></i> Thêm loại sản phẩm</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
                <i class="fa fa-puzzle-piece"></i>
                <span>Sản phẩm</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('backend.sanpham.danhsach')}}"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
                <li><a href="{{route('backend.sanpham.them')}}"><i class="fa fa-circle-o"></i> Thêm sản phẩm</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
                <i class="fa fa-sticky-note"></i>
                <span>Loại bài viết</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('backend.loaibv.danhsach')}}"><i class="fa fa-circle-o"></i> Danh sách loại bài viết</a></li>
                <li><a href="{{route('backend.loaibv.them')}}"><i class="fa fa-circle-o"></i> Thêm loại bài viết</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
                <i class="fa fa-book"></i>
                <span>Bài viết</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('backend.baiviet.danhsach')}}"><i class="fa fa-circle-o"></i> Danh sách bài viết</a></li>
                <li><a href="{{route('backend.baiviet.them')}}"><i class="fa fa-circle-o"></i> Thêm bài viết</a></li>
            </ul>
          </li>

          <li class="treeview">
              <a href="#">
                  <i class="fa fa-gear"></i>
                  <span>Quản lý giao diện</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{route('backend.loaisp.danhsach')}}"><i class="fa fa-circle-o"></i> Danh sách loại sản phẩm</a></li>
                  <li><a href="{{route('backend.loaisp.them')}}"><i class="fa fa-circle-o"></i> Thêm loại sản phẩm</a></li>
              </ul>
            </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>