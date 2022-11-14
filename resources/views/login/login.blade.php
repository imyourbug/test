@extends('main')

@section('content')
    <section class="vh-100 m-t-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="/template/images/icons/img-login.png"
                                     alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; width: 100%" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="/login" method="post">

                                        <h5 class="fw-normal mb-3 pb-3 text-center "
                                            style="letter-spacing: 1px; font-weight: bold">ĐĂNG NHẬP</h5>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">Email address</label>
                                            <input name="email" type="email" id="form2Example17" class="form-control form-control-lg" required/>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <input name="password" type="password" id="form2Example27" class="form-control form-control-lg" required />
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <a href="{{ route('loginGoogle') }}" class="btn btn-danger btn-block text-white" type="submit">
                                                <i class="fa fa-google-plus"></i><span>&emsp; </span>
                                                Login with Google
                                            </a>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <a href="{{ route('loginFacebook') }}" class="btn btn-primary btn-block text-white" type="submit">
                                                <i class="fa fa-facebook"></i><span>&emsp; </span>
                                                Login with Facebook
                                            </a>
                                        </div>

                                        <a class="small text-muted" href="#!">Quên mật khẩu?</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Bạn chưa có tài khoản?
                                            <a href="/register" style="color: #ee3148;">Đăng kí tại đây</a>
                                        </p>
                                        @csrf
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
