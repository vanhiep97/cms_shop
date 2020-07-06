@extends('cms.layouts.auth')
@section('auth-content')
<div class="login-container col-md-6 col-md-offset-3" id="login-form">
    <div class="login-frame clearfix">
        <center><h3 class="heading col-md-10 col-md-offset-1 padd-0"><i class="fa fa-lock"></i>Đăng nhập vào hệ thống</h3></center>
        <div class="col-md-10 col-md-offset-1">
            <form id="form-login" class="form-horizontal login-form frm-sm">
                <div class="form-group input-icon">
                    <label for="inputEmail3" class="sr-only control-label">Email</label>
                    <input type="text" name="email"
                           class="form-control" id="inputEmail3" placeholder="Email/Mã Đăng nhập">
                    <i class="fa fa-user icon-right"></i>
                </div>
                <div class="form-group input-icon">
                    <label for="inputPassword3" class="sr-only control-label">Password</label>
                    <input type="password" name="password"
                           class="form-control" id="inputPassword3" placeholder="Mật khẩu">
                    <i class="fa fa-lock icon-right"></i>
                </div>

                <div class="form-group input-icon">
                    <label>
                        <input type="checkbox"> Nhớ mật khẩu
                    </label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Đăng nhập</button>
                </div>
                <div class="link-action text-center">
                    <div class="col-sm-12 col-xs-12">
                        <span>Nếu bạn không nhớ mật khẩu !! </span><a href="{{ route('page-forgot-password') }}" style="margin-top: 5px; color: #0f74a8; text-align: center; font-weight: 600;text-decoration: underline" class="fg-passw"><span class="alert-link">Quên
                            mật khẩu</span></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


