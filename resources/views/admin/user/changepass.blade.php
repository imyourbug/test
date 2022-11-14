
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>
<body class="hold-transition login-page" style="background: url(/template/images/Login_bg.jpg) no-repeat center fixed ;" >
<div class="login-box" >
    <div class="login-logo">
        <a href=""><b style="color: #ffffff">Đổi mật khẩu</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body" style="background: #000">
            <p class="login-box-msg">Vui lòng nhập tài khoản mật khẩu</p>
            @include('admin.alert')
            <form action="{{ route('changePassword') }}" method="post">
                <div class="input-group mb-4">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <input type="password" name="current-password" class="form-control" placeholder="Mật khẩu cũ">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-4">
                    <input type="password" name="new-password" class="form-control" placeholder="Mật khẩu mới">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                    <!-- /.col -->
                    <div class="">
                        <button type="submit" class="btn btn-primary btn-block">Đổi mật khẩu</button>
                    </div>
                    <!-- /.col -->
                @csrf
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>

@include('admin.footer')
</body>
</html>
