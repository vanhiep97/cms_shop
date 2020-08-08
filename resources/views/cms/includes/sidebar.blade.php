
@php
    $user = auth()->user()->level;
@endphp
<div class="sidebar sidebar-fixed hidden-xs hidden-sm hidden-md" id="sidebar">
    <ul class="nav nav-pills nav-list nav-stacked">
        @if($user === 4 || $user === 0)
            <li>
                <a href="{{ route('pos.index') }}" style="color: white;background-color: #ffb752!important;">
                    <i class="fa fa-balance-scale" aria-hidden="true"></i>Pos bán hàng
                </a>
            </li>
        @endif

        @if($user === 4 || $user === 0)
            <li>
                <a href="{{ route('home.index') }}">
                    <i class="fa fa-tachometer"></i>Tổng quan
                </a>
            </li>
        @endif

        @if($user === 4 || $user === 0)
            <li>
                <a href="{{ route('orders.index') }}">
                    <i class="fa fa-shopping-cart"></i>Đơn hàng
                </a>
            </li>
        @endif

        @if($user === 4 || $user === 0)
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
                            <a href="{{ route('product-defectives.index') }}">Hàng hóa đổi trả</a>
                        </li>
                        @if($user === 4 || $user === 0)
                            <li id="orders"><a href="{{ route('group-products.index') }}"></i>Danh mục</a></li>
                        @endif

                        @if($user === 4 || $user === 0)
                            <li id="orders"><a href="{{ route('manufactures.index') }}"></i>Nhà sản xuất</a></li>
                        @endif
                    </ul>
                </div>
            </li>
        @endif

        @if($user === 4 || $user === 0)
            <li><a href="{{ route('customers.index') }}"><i class="fa fa-users"></i>Khách hàng</a></li>
        @endif

        @if($user === 4 || $user === 0)
            <li><a href="{{ route('suppliers.index') }}"><i class="fa fa-recycle" aria-hidden="true"></i>Nhà cung cấp</a></li>
        @endif

        @if($user === 4 || $user === 0)
            <li class="sidebar-dropdown">
                <a id="parent" href="javascript:void(0)">
                    <i class="fa fa-sitemap" aria-hidden="true"></i>Mẫu biểu
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="{{ route('forms.listPurchaseOrders') }}">Đơn mua hàng</a></li>
                        <li><a href="{{ route('forms.listInputs') }}">Phiếu nhập kho</a></li>
                        <li><a href="{{ route('forms.listBillOutStocks') }}">Phiếu xuất kho</a></li>
                        <li><a href="{{ route('forms.listBillOrders') }}">Hóa đơn mua</a></li>
                        <li><a href="{{ route('forms.listBillExchanges') }}">Phiếu đổi trả</a></li>
                    </ul>
                </div>
            </li>
        @endif

        <li><a href="{{ route('inventories.index') }}"><i class="fa fa-list-alt"></i>Tồn kho</a></li>
        <li><a href="{{ route('revenues.all') }}"><i class="fa fa-signal"></i>Doanh số</a></li>
        <li><a href="{{ route('profits.all') }}"><i class="fa fa-usd"></i>Lợi nhuận</a></li>
        <li><a href="{{ route('settings.index') }}"><i class="fa fa-cogs"></i>Thiết lập</a></li>

    </ul>
</div>
