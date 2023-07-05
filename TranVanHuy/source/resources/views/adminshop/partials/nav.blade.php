<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('adminshop.index') }}" class="brand-link">
        <img src="dashboard/dist/img/Vin.jpg" alt="Vinfruts Logo" class="brand-image img-circle elevation-3 mr-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">NaFruits</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="sidebar-block">
            <div class="profile">
                <a href="#">
                    <img src="dashboard/dist/img/anhdaidien.jpg" class="img-circle width-80" alt="User Image">
                </a>
                <h4 class="text-display-1 margin-none">Trần Văn Huy</h4>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('adminshop.index') }}" class="nav-link active">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Trang chủ
                        </p>
                    </a>
                </li>
                <li class="nav-header">QUẢN LÝ</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-paste  ml-2 mr-1"></i>
                        <p>Quản lý bài viết</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview ml-2">
                        <li class="nav-item">
                            <a href="{{ route('adminshop.post.category.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loại bài viết</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminshop.post.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bài viết</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('adminshop.comment.index') }}" class="nav-link">
                        <i class="fas fa-comments nav-icon"></i>
                        <p>Quản lý bình luận</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fab fa-product-hunt ml-2 mr-1" style="content: '\f104';"></i>
                        <p>Quản lý sản phẩm</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview ml-2">
                        <li class="nav-item">
                            <a href="{{ route('adminshop.unit.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đơn vị tính</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminshop.productcategory.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loại sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminshop.supplier.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nhà cung cấp</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminshop.trademark.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nơi xuất xứ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminshop.promotion.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Khuyến mãi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminshop.product.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sản phẩm</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('adminshop.cart.index') }}" class="nav-link">
                        <i class="fa fa-shopping-cart nav-icon"></i>
                        <p>Quản lý giỏ hàng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('adminshop.invoice.index') }}" class="nav-link">
                        <i class="far fa-bookmark nav-icon"></i>
                        <p>Quản lý hóa đơn</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('adminshop.slider.index') }}" class="nav-link">
                        <i class="fa fa-fw fa-sliders nav-icon"></i>
                        <p>Quản lý slider</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('adminshop.menu.index') }}" class="nav-link">
                        <i class="fas fa-bars nav-icon"></i>
                        <p>Quản lý menu</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
