<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <!--left-fixed -navigation-->
    <aside class="sidebar-left">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1><a class="navbar-brand" href="{{ url('/') }}"><span class="fa fa-area-chart"></span> Glance<span class="dashboard_text">Design dashboard</span></a></h1>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="treeview">
                        <a href="{{ url('/admin/') }}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Shop</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/shop/category') }}"><i class="fa fa-angle-right"></i> Danh mục</a></li>
                            <li><a href="{{ url('/admin/shop/product') }}"><i class="fa fa-angle-right"></i> Sản phẩm</a></li>
                            <li><a href="{{ url('/admin/shop/order') }}"><i class="fa fa-angle-right"></i> Đơn hàng</a></li>
                            <li><a href="{{ url('/admin/shop/review') }}"><i class="fa fa-angle-right"></i> Đánh giá</a></li>
                            <li><a href="{{ url('/admin/shop/customer') }}"><i class="fa fa-angle-right"></i> Khách hàng</a></li>
                            <li><a href="{{ url('/admin/shop/shipper') }}"><i class="fa fa-angle-right"></i> Nhà vận chuyển</a></li>
                            <li><a href="{{ url('/admin/shop/seller') }}"><i class="fa fa-angle-right"></i> Nhà cung cấp</a></li>
                            <li><a href="{{ url('/admin/shop/brand') }}"><i class="fa fa-angle-right"></i> Nhãn hiệu</a></li>
                            <li><a href="{{ url('/admin/shop/statistic') }}"><i class="fa fa-angle-right"></i> Thống kê</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Content</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/content/category') }}"><i class="fa fa-angle-right"></i> Danh mục</a></li>
                            <li><a href="{{ url('/admin/content/post') }}"><i class="fa fa-angle-right"></i> Bài viết</a></li>
                            <li><a href="{{ url('/admin/content/page') }}"><i class="fa fa-angle-right"></i> Trang</a></li>
                            <li><a href="{{ url('/admin/content/tag') }}"><i class="fa fa-angle-right"></i> Tag</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Menu</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/menu') }}"><i class="fa fa-angle-right"></i> Menu</a></li>
                            <li><a href="{{ url('/admin/menuitems') }}"><i class="fa fa-angle-right"></i> Menu items</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Admin</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/users') }}"><i class="fa fa-angle-right"></i> Quản trị viên</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Media manager</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/media') }}"><i class="fa fa-angle-right"></i> Media manager</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Global settings</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/config') }}"><i class="fa fa-angle-right"></i> Global settings</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>newsletters</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/newsletters') }}"><i class="fa fa-angle-right"></i> newsletters</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Banners</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/banners') }}"><i class="fa fa-angle-right"></i> Banners</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Contact</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/contacts') }}"><i class="fa fa-angle-right"></i> Liên hệ</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Email</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/email/inbox') }}"><i class="fa fa-angle-right"></i> Inbox</a></li>
                            <li><a href="{{ url('/admin/email/draft') }}"><i class="fa fa-angle-right"></i> Draft</a></li>
                            <li><a href="{{ url('/admin/email/send') }}"><i class="fa fa-angle-right"></i> Send</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </aside>
</div>