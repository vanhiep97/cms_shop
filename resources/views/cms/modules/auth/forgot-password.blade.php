@extends('cms.layouts.auth')
@section('auth-content')
    <div class="login-container col-md-6 col-md-offset-3" id="password-sent">
        <div class="login-frame clearfix">
            <h3 class="heading col-md-10 col-md-offset-1 padd-0 text-center"><i class="fa fa-lock"></i>Quên mật khẩu</h3>
            <p class="col-md-10 col-md-offset-1 padd-0">Vui lòng nhập vào địa chỉ email để nhận mã code xác thực!</p>
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal login-form" method="post" action="authentication/fg_password">
                    <div class="form-group input-icon">
                        <label for="inputEmail3" class="sr-only control-label">Email</label>
                        <input type="text" name="email"
                               class="form-control" id="inputEmail3" placeholder="Nhập email của bạn">
                        <i class="fa fa-sitemap icon-right"></i>
                    </div>
                    <div class="form-group" style="display: flex;justify-content: space-between;align-items: center">
                        <button type="submit" name="forgot" class="btn btn-primary btn-sm" style="margin-right: 20px">Gửi mã</button>
                        <a href="{{ route('page-reset-password') }}" class="btn btn-primary btn-sm">Lấy lại mật khẩu</a>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('page-login') }}" class="btn btn-primary btn-sm">Quay lại màn hình đăng nhập</a>
                    </div>
                    <div class="link-action text-center">
                        <div class="col-sm-12 col-xs-12">
                            <span>Nếu bạn không nhận được mã code !! </span><a href="{{ route('page-forgot-password') }}" style="margin-top: 5px; color: #0f74a8; text-align: center; font-weight: 600;text-decoration: underline" class="fg-passw"><span class="alert-link">Gửi lại mã code</span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
