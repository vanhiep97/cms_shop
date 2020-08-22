
@php
    $user = auth()->user()->level;
@endphp
<div class="sidebar sidebar-fixed hidden-xs hidden-sm hidden-md" id="sidebar">
    <ul class="nav nav-pills nav-list nav-stacked">
        @if($user === 4 || $user === 0 || $user === 1)
            <li>
                <a href="{{ route('pos.index') }}" style="color: white;background-color: #ffb752!important;">
                    <i class="fa fa-balance-scale" aria-hidden="true"></i>Pos bán hàng
                </a>
            </li>
        @endif

        <li>
            <a href="{{ route('home.index') }}">
                <i class="fa fa-tachometer"></i>Tổng quan
            </a>
        </li>

        <li>
            <a href="{{ route('orders.index') }}">
                <i class="fa fa-shopping-cart"></i>Đơn hàng
            </a>
        </li>

        <li class="sidebar-dropdown">
            <a id="parent" href="javascript:void(0)">
                    <i class="fa fa-suitcase" aria-hidden="true"></i>Sản phẩm
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="{{ route('products.index') }}">Danh sách sản phẩm</a>
                    </li>
                    <li>
                        <a href="{{ route('product-defectives.index') }}">Hàng hóa lỗi</a>
                    </li>
                    <li>
                        <a href="{{ route('products.threshold') }}">Hàng hóa sắp hết</a>
                    </li>

                     <li>
                        <a href="{{ route('products.over') }}">Hết hàng</a>
                    </li>

                    @if($user === 0 || $user === 1 || $user === 2)
                        <li id="orders"><a href="{{ route('group-products.index') }}"></i>Danh mục</a></li>
                    @endif

                    @if($user === 0 || $user === 1 || $user === 2)
                        <li id="orders"><a href="{{ route('manufactures.index') }}"></i>Thương hiệu</a></li>
                    @endif
                </ul>
            </div>
        </li>

        <li><a href="{{ route('customers.index') }}"><i class="fa fa-users"></i>Khách hàng</a></li>

        @if($user === 0 || $user === 1 || $user === 2 || $user === 3)
            <li><a href="{{ route('suppliers.index') }}"><i class="fa fa-recycle" aria-hidden="true"></i>Nhà cung cấp</a></li>
        @endif

        <li class="sidebar-dropdown">
            <a id="parent" href="javascript:void(0)">
                <i class="fa fa-sitemap" aria-hidden="true"></i>Mẫu biểu
            </a>
            <div class="sidebar-submenu">
                <ul>
                    @if($user === 0 || $user === 1 || $user === 2 || $user === 3)
                        <li><a href="{{ route('forms.listPurchaseOrders') }}">Phiếu yêu cầu nhập hàng</a></li>
                        <li><a href="{{ route('forms.listInputs') }}">Phiếu nhập kho</a></li>
                        <li><a href="{{ route('forms.listBillOutStocks') }}">Phiếu xuất kho</a></li>
                        <li><a href="{{ route('forms.listBillOrders') }}">Hóa đơn mua</a></li>
                    @endif
                    <li><a href="{{ route('forms.listBillExchanges') }}">Phiếu đổi trả</a></li>
                </ul>
            </div>
        </li>

        <li><a href="{{ route('inventories.index') }}"><i class="fa fa-list-alt"></i>Tồn kho</a></li>

        @if($user === 0 || $user === 1 || $user === 3)
            <li><a href="{{ route('revenues.all') }}"><i class="fa fa-signal"></i>Doanh số</a></li>
        @endif

        @if($user === 0 || $user === 1 || $user === 3)
            <li><a href="{{ route('profits.all') }}"><i class="fa fa-usd"></i>Lợi nhuận</a></li>
        @endif

        @if($user === 0 || $user === 1)
            <li><a href="{{ route('settings.index') }}"><i class="fa fa-cogs"></i>Quản lý nhân sự</a></li>
        @endif
    </ul>
</div>
