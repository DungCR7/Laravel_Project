<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/main" class="brand-link">
    <img src="{{asset('')}}template/images/icons/b1.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Shop Dung </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    

    <!-- SidebarSearch Form -->
   

    <!-- Sidebar Menu -->
    <nav class="mt-1">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
            <p>
              Danh mục
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('menu.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm danh mục</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('menu.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách danh mục</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shopping-basket"></i>
            <p>
              Sản phẩm
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('product.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm sản phẩm</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('product.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách sản phẩm</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shopping-basket"></i>
            <p>
              Slider
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('Slider.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm tiêu đề </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('Slider.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tiêu Đề </p>
              </a>
            </li>

          </ul>
        </li>
       
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shopping-basket"></i>
            <p>
              Đơn Hàng
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('q')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Danh Sách Đơn Hàng   </p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>

   
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>