<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('admin.home') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="55">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('admin.home') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="55">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>@lang('translation.menu')</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ preg_match('/^admin\.users.*$/', Route::currentRouteName()) ? 'active' : '' }}"
                        href="{{ route('admin.users.index') }}">
                        <i class="ri-user-line"></i> <span>ユーザー管理</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link  {{ Request::is('admin/products*') ? 'active' : '' }}"
                        href="{{ route('admin.products.index') }}">
                        <i class="ri-product-hunt-line"></i> <span>商品管理</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link  {{ Request::is('admin/notifications*') ? 'active' : '' }}"
                        href="{{ route('admin.notifications.index') }}">
                        <i class="ri-notification-2-line"></i> <span>お知らせ管理</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link  {{ Request::is('admin/blogs*') ? 'active' : '' }}"
                        href="{{ route('admin.blogs.index') }}">
                        <i class="ri-article-line"></i> <span>ブログ管理</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link  {{ Request::is('admin/product-reviews*') ? 'active' : '' }}"
                        href="{{ route('admin.product-reviews.index') }}">
                        <i class="ri-star-half-line"></i> <span>商品レビュー管理</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link  {{ Request::is('admin/makers*') ? 'active' : '' }}"
                        href="{{ route('admin.makers.index') }}">
                        <i class="ri-user-star-line"></i> <span>メーカー管理</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ Request::is('admin/first-page/*') ? 'true' : 'false' }}"
                        aria-controls="sidebarTables">
                        <i class="ri-layout-grid-line"></i> <span>ファーストページ管理</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::is('admin/first-page/*') ? 'show' : '' }}"
                        id="sidebarTables">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.first-page.privacy-policies.index') }}"
                                    class="nav-link {{ Request::is('admin/first-page/privacy-policies*') ? 'active' : '' }}">プライバシー
                                    ポリシー</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.first-page.tou.index') }}"
                                    class="nav-link {{ Request::is('admin/first-page/tou*') ? 'active' : '' }}">利用規約</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.first-page.faq.index') }}"
                                    class="nav-link {{ Request::is('admin/first-page/faq*') ? 'active' : '' }}">サイト説明(FAQ)</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
