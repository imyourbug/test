
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>
<body class="hold-transition login-page" style="background: url(/template/images/Login_bg.jpg) no-repeat center fixed ;" >
<div class="login-box" >
    <div class="login-logo">
        <a href=""><b style="color: #ffffff">Đăng nhập Admin</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body" style="background: #000">
            <p class="login-box-msg">Vui lòng nhập tài khoản mật khẩu</p>
            @include('admin.alert')
            <form action="/admin/users/login/store" method="post">
                <div class="input-group mb-4">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
                @csrf
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>

@include('admin.footer')
</body>
</html>
