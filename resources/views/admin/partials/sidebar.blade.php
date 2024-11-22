<aside class="sidebar navbar-default" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{route('admin.index')}}" class="@yield('active-index')"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{route('category.index')}}" class="@yield('active-category')"><i class="fa fa-book"></i>Quản lý danh mục bài viết </a>
            </li>
            <li>
                <a href="{{route('post.index')}}" class="@yield('active-article')"><i class="fa fa-table fa-fw"></i> Quản lý bài viết</a>
            </li>
            <li>
                <a href="{{route('news-video.index')}}" class="@yield('active-news-video')"><i class="fa fa-table fa-fw"></i>Quản lý news-video</a>
            </li>

            <li>
                <a href="{{route('advertisement.index')}}" class="@yield('active-ad')"><i class="fa fa-table fa-fw"></i> Quản lý quảng cáo</a>
            </li>
            <li>
                <a href="{{route('contact-request.index')}}" class="@yield('active-contact-request')"><i class="fa fa-table fa-fw"></i> Quản lý tin nhắn khách hàng</a>
            </li>
            <li>
                <a href="{{route('subcribe.index')}}" class="@yield('active-subcribe')"><i class="fa fa-table fa-fw"></i> Quản lý đăng ký</a>
            </li>
            <li>
                <a href="{{route('admin.contact')}}" class="@yield('active-contact')"> <i class="fa fa-table fa-fw"></i>Quản lý thông tin trang</a>
            </li>
           
           
             
                <!-- /.nav-second-level -->
          
        </ul>
    </div>
</aside>