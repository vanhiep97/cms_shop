<nav id="navbar-container" class="navbar navbar- navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle menu-toggler pull-left"
                    onclick="$('#sidebar').toggleClass('hidden-xs hidden-sm hidden-md')">
                <span class="sr-only">Toggle sidebar</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul style="color: #fff;font-size: 15px;position: absolute;top: 10px;">
                <li>
                   CMS Shop Fashion design by tranhiep
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="notifications">
                    Thông báo <i class="fa fa-bell-o"><span id="bell_count">1</span></i>
                </li> --}}
                <li>
                    <label style="margin: 13px 15px; color: white">
                        {{ trans('message.welcome') }}
                        Cửa hàng
                    </label>
                </li>
                <li style="display: flex">
                    <a href="{!! route('user.change-language', ['en']) !!}">English</a>
                    <a href="{!! route('user.change-language', ['vi']) !!}">Vietnam</a>
                </li>
                <li class="dropdown user-profile">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><span
                            class="hello">Xin chào, </span>{{ auth()->guard('web')->user()->name }}<span
                            class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile') }}"><i class="fa fa-user"></i>Tài khoản</a></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i>Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
