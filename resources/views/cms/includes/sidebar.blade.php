<div class="sidebar sidebar-fixed hidden-xs hidden-sm hidden-md" id="sidebar">
    <ul class="nav nav-pills nav-list nav-stacked">
        <li id="dashboard"><a href="{{ route('pos.index') }}" style="    color: white;background-color: #ffb752!important;"><i class="fa fa-tachometer"></i>Pos bán hàng</a></li>
        <li id="dashboard"><a href="{{ route('home.index') }}"><i class="fa fa-tachometer"></i>Tổng quan</a></li>
        <li id="orders"><a href="{{ route('orders.index') }}"><i class="fa fa-shopping-cart"></i>Đơn hàng</a></li>
        <li id="orders"><a href="{{ route('group-products.index') }}"><i class="fa fa-shopping-cart"></i>Danh mục</a></li>
        <li id="orders"><a href="{{ route('manufactures.index') }}"><i class="fa fa-shopping-cart"></i>Nhà sản xuất</a></li>
        <li id="product"><a href="{{ route('products.index') }}"><i class="fa fa-barcode"></i>Sản phẩm</a></li>
        <li id="customer"><a href="{{ route('customers.index') }}"><i class="fa fa-users"></i>Khách hàng</a></li>
        <li id="supplier"><a href="{{ route('suppliers.index') }}"><i class="fa fa-users"></i>Nhà cung cấp</a></li>
        <li id="notification"><a href="{{ route('product-defectives.index') }}"><i class="fa fa-bell-o"></i>Hàng bị lỗi</a></li>
        <li id="import"><a href="{{ route('forms.listPurchaseOrders') }}"><i class="fa fa-truck"></i>Đơn mua hàng</a></li>
        <li id="import"><a href="{{ route('forms.listInputs') }}"><i class="fa fa-truck"></i>Phiếu nhập kho</a></li>
        <li id="import"><a href="{{ route('forms.listBillOrders') }}"><i class="fa fa-truck"></i>Hóa đơn mua</a></li>
        <li id="inventory"><a href="{{ route('inventories.index') }}"><i class="fa fa-list-alt"></i>Tồn kho</a></li>
        <li id="revenue"><a href="{{ route('revenues.index') }}"><i class="fa fa-signal"></i>Doanh số</a></li>
        <li id="profit"><a href="{{ route('profits.index') }}"><i class="fa fa-usd"></i>Lợi nhuận</a></li>
        <li id="config"><a href="{{ route('settings.index') }}"><i class="fa fa-cogs"></i>Thiết lập</a></li>
    </ul>
</div>
