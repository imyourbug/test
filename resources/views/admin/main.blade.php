
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-yellow navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" href="#" role="button">
                    <strong>{{ Auth::user()->name }}</strong>
                </a>
            </li>
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right dropdown-logout" style="left: inherit; right: 0px;">
                        <!-- Message Start -->
                        <div class="media">
                            <div class="media-body p-tb-6 text-center border-bottom">
                                <a style="color: #000" href="/admin/logout" class="dropdown-item-title">
                                   Đăng Xuất
                                </a>
                            </div>
                        </div>
                        <!-- Message End -->
                        <!-- Message Start -->
                        <div class="media">
                            <div class="media-body p-tb-6 text-center border-bottom">
                                <a href="/admin/showChangePasswordForm" style="color: #000" class="dropdown-item-title">
                                    Đổi mật khẩu
                                </a>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    @include('admin.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary mt-3">
                            <div class="card-header">
                                <h3 class="card-title">{{ $title }}</h3>
                            </div>

                            @yield('content')
                        </div>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

</div>
<!-- ./wrapper -->
@include('admin.footer')
</body>
</html>
