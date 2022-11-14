
<header>
    @php
        $menusHtml = \App\Helpers\Helper::menus($menus);
    @endphp
<!-- Header desktop -->
<div class="container-menu-desktop p-b-10">

    <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">

            <!-- Logo desktop -->
            <a href="/" class="logo">
                <img src="/template/images/icons/logo.png" alt="IMG-LOGO" >
            </a>

            <!-- Menu desktop -->
            <div class="menu-desktop">
                <ul class="main-menu">
                    <li class="active-menu">
                        <a href="/">TRANG CHỦ</a>
                    </li>
                    {!! $menusHtml !!}
                    <li>
                        <a href="about.html">THÔNG TIN</a>
                    </li>

                    <li>
                        <a href="contact.html">LIÊN HỆ</a>
                    </li>
                </ul>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m">
                <form action="" class="form-inline" role="form">
                    <input name="key-search" placeholder="Tìm kiếm" style="padding: 5px" class="search">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-11 p-r-11 menu-icon">
                        <button type="submit"><i class="zmdi zmdi-search"></i></button>
                    </div>
                </form>


                <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart menu-icon"
                     data-notify="{{ Session::get('carts') === null ? 0 : count(Session::get('carts'))  }}">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
                @php
                    $check = \Illuminate\Support\Facades\Session::get('check') ?? '';
                    $checkGoogle = \Illuminate\Support\Facades\Session::get('checkGoogle') ?? '';
                    $checkFacebook = \Illuminate\Support\Facades\Session::get('checkFacebook') ?? '';
                @endphp

                @if($check || $checkGoogle || $checkFacebook)
                    <div class="p-l-4">
                        <div class="menu-desktop">
                            <ul class="main-menu">
                                <li class="active-menu">
                                    <i class="fa fa-user " style="font-size: 20px"></i>
                                    <ul class="sub-menu" style="width: 50px;">
                                        <li><a href="/logout">Đăng xuất</a></li>
                                        <li><a href="/changePassword">Đổi mật khẩu</a></li>
                                        <li><a href="/orderStatus">Đơn mua</a></li>
                                    </ul>
                                </li>
                                <li class="active-menu">
                                    <span class="user-name">{{ Auth::user()->name }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <a href="/login" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 ">
                        <i class="fa fa-user"></i>
                    </a>
                @endif
            </div>

        </nav>
    </div>
</div>

<!-- Header Mobile -->
<div class="wrap-header-mobile">
    <!-- Logo moblie -->
    <div class="logo-mobile">
        <a href="/"><img src="/template/images/icons/logo.png" alt="IMG-LOGO"></a>
    </div>

    <!-- Icon header -->
    <div class="wrap-icon-header flex-w flex-r-m m-r-15">
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
            <i class="zmdi zmdi-search"></i>
        </div>

        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
             data-notify="{{ Session::get('carts') === null ? 0 : count(Session::get('carts'))  }}">
            <i class="zmdi zmdi-shopping-cart"></i>
        </div>

    </div>

    <!-- Button show menu -->
    <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
    </div>
</div>


<!-- Menu Mobile -->
<div class="menu-mobile">
    <ul class="topbar-mobile">

        <ul class="main-menu-m">

            <li class="active-menu">
                <a href="/">TRANG CHỦ</a>
            </li>

            {!! $menusHtml !!}

            <li>
                <a href="about.html">GIỚI THIỆU</a>
            </li>

            <li>
                <a href="contact.html">LIÊN HỆ</a>
            </li>
        </ul>
    </ul>
</div>

<!-- Modal Search -->
<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
    <div class="container-search-header">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
            <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
        </button>

        <form class="wrap-search-header flex-w p-l-15">
            <button class="flex-c-m trans-04">
                <i class="zmdi zmdi-search"></i>
            </button>
            <input class="plh3" type="text" name="search" placeholder="Search...">
        </form>
    </div>
</div>
</header>
