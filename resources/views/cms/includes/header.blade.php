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
                <li style="list-style: none;">
                   {{-- CMS Shop Fashion design by tranhiep --}}
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="height: 50px; width: 400px;">
                <li class="dropdown user-profile" style="height: 50px; display: flex; align-items: center; float: right; color: #fff; margin-right: 50px">
                    <div class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false" style="display: flex;align-items: center;justify-content: center">
                        <span style="border: 2px solid #fff; border-radius: 50%; width: 30px; height: 30px;
                                        display: flex;align-items: center;justify-content: center; margin-right: 10px">
                            <img src="https://png.pngtree.com/png-clipart/20190520/original/pngtree-user-vector-icon-png-image_3788518.jpg" width="30px" style="border-radius: 50%;" alt="">
                        </span>
                        {{ auth()->guard('web')->user()->name }}
                        <span class="caret"></span>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile') }}"><i class="fa fa-user"></i>Tài khoản</a></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i>Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
