@extends('cms.layouts.auth')
@section('auth-content')
    <div class="login-container col-md-6 col-md-offset-3" id="password-sent">
        <div class="login-frame clearfix">
            <h3 class="heading col-md-10 col-md-offset-1 padd-0 text-center"><i class="fa fa-refresh fa-fw"></i> Thay đổi mật khẩu!</h3>
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal login-form" method="post" action="">
                    <div class="form-group input-icon">
                        <label for="inputEmail3" class="sr-only control-label">Mã xác thực</label>
                        <input id="pass1" type="text" name="code_verify"
                               value=""
                               class="form-control" placeholder="Mã xác thực">
                        <i class="fa fa-sitemap icon-right"></i>
                    </div>
                    <div class="form-group input-icon">
                        <label for="inputEmail3" class="sr-only control-label">Mật khẩu</label>
                        <input id="pass1" type="password" name="password"
                               class="form-control" placeholder="Mật khẩu mới">
                        <i class="fa fa-lock icon-right"></i>
                    </div>
                    <div class="form-group input-icon">
                        <label for="inputEmail3" class="sr-only control-label">Xác nhận mật khẩu</label>
                        <input id="pass2" type="password" name="password"
                               class="form-control" placeholder="Xác nhận mật khẩu mới">
                        <i class="fa fa-lock icon-right"></i>
                    </div>
                    <div class="form-group" style="display: flex;justify-content: space-between;align-items: center">
                        <button type="submit" name="reset" class="btn btn-primary btn-sm btn-smf" style="margin-right: 20px"><i
                                class="fa fa-key"></i>Đổi mật khẩu
                        </button>
                        <a href="{{ route('page-login') }}" class="btn btn-primary btn-sm">Đăng nhập ngay</a>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('page-forgot-password') }}" class="btn btn-primary btn-sm">Quay lại màn hình gửi mã code</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
