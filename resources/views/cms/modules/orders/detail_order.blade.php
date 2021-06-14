<div class="breadcrumbs-fixed panel-action">
    <div class="row">
        <div class="orders-act">
            <div class="col-md-4 col-md-offset-2">
                <div class="left-action text-left clearfix">
                    <h2>Đơn hàng &raquo;<span
                            style="font-style: italic; font-weight: 400; font-size: 16px;">code</span>
                    </h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-action text-right">
                    <div class="btn-groups">
                            <button type="button" class="btn btn-primary" onclick="cms_vsell_order();"><i
                                    class="fa fa-plus"></i> Tạo đơn hàng mới
                            </button>
                            <button type="button" class="btn btn-primary"><i
                                    class="fa fa-print"></i> In đơn hàng
                            </button>
                            <button type="button" class="btn btn-default"><i
                                    class="fa fa-arrow-left"></i> Quay lại
                            </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-space orders-space"></div>
<div class="orders-content">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered table-striped" style="margin-top: 30px;">
                <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th>Mã hàng</th>
                    <th>Tên sản phẩm</th>
                    <th class="text-center">Số lượng</th>
                    <th class="text-center">Giá bán</th>
                    <th class="text-center">Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                <tr data-id="">
                    <td class="text-center">STT</td>
                    <td>code</td>
                    <td>name</td>
                    <td class="text-center" style="max-width: 30px;">SL</td>
                    <td class="text-center price-order">GB</td>
                    <td class="text-center total-money">TT</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="morder-info" style="padding: 4px;">
                        <div class="tab-contents" style="padding: 8px 6px;">
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Mã phiếu</label>
                                </div>
                                <div class="col-md-7">
                                    Code
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Khách hàng</label>
                                </div>
                                <div class="col-md-7" style="font-style: italic;">
                                    KH
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Ngày bán</label>
                                </div>
                                <div class="col-md-7">
                                    selldate
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>NV bán hàng</label>
                                </div>
                                <div class="col-md-7">
                                    NV
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Ghi chú</label>
                                </div>
                                <div class="col-md-7">
                                    <textarea readonly id="note-order" cols="" class="form-control" rows="3"
                                              style="border-radius: 0;">Note</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h4 class="lighter" style="margin-top: 0;">
                        <i class="fa fa-info-circle blue"></i>
                        Thông tin thanh toán | Lịch sử
                    </h4>

                    <div class="morder-info" style="padding: 4px;">
                        <div class="tab-contents" style="padding: 8px 6px;">
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Hình thức</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <input disabled type="radio" class="payment-method" name="method-pay"
                                               value="1">
                                        Tiền mặt &nbsp;
                                        <input disabled type="radio" class="payment-method" name="method-pay"
                                               value="2">
                                        CK&nbsp;
                                    </div>

                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Tiền hàng</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="">
                                        Total
                                    </div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Chiếc khấu</label>
                                </div>
                                <div class="col-md-7">
                                    <div>Coupon</div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Tổng cộng</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="">
                                        Tong tien
                                    </div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5 padd-right-0">
                                    <label>Khách đưa</label>
                                </div>
                                <div class="col-md-7 orange">
                                    Khach dua
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Còn nợ</label>
                                </div>
                                <div class="col-md-7">
                                    <div
                                        class="">Tra lai</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
