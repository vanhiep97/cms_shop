jQuery(document).ready(function ($) {
    function loadSwalAlert(icon, title, message) {
        Swal.fire({
            icon: icon,
            title: title,
            text: message,
        });
    }

    $(document).bind("keydown", function (ev) {
        if (ev.keyCode == 113) {
            $('#search-pro-box').focus();
            $('#search-pro-box').val('SKU');
        }
        if (ev.keyCode == 115) {
            $('#search-box-customer').focus();
            $('#search-box-customer').val('KH');
        }
        if (ev.keyCode == 118) {
            $('#discount-order').focus();
        }
        if (ev.ctrlKey && ev.keyCode == 119) {
            $('.customer-pay').focus();
        }
        if (ev.keyCode == 120) {
            $('#btn-save-order').click();
        }
        if (ev.keyCode == 121) {
            $('#btn-save-print-order').click();
        }
    });

    // search customer
    $(document).on('keyup', '#search-box-customer', function (e) {
        e.preventDefault();
        $('#search-result-customer').css('display', 'block');
        const query = $(this).val().toLowerCase();
        let urlResource = '/admin/pos/search/customers';
        if(query !== '') {
            callAjax(urlResource, 'GET', {
                param: query
            })
                .done(response => {
                    $('#search-result-customer').html(response);
                })
                .fail(error => {
                    console.log(error);
                })
        } else {
            $('#search-result-customer').val('');
            $('#search-result-customer').css('display', 'none');
        }
    });

    $(document).on('click', '#customer-on-pos', function (e) {
        e.preventDefault();
        let customerName = $(this).attr('data-name');
        let customerCode = $(this).attr('data-code');
        let customerId = $(this).attr('data-id');
        $('#search-box-customer').val(customerCode + ' - ' + customerName);
        $('#search-box-customer').attr('data-id', customerId);
        $('#search-result-customer').css('display', 'none');
    });

    $(document).on('click', '#close-form-customer', function() {
        $('#search-box-customer').val('');
    })

    // search product
    $(document).on('keyup', '#search-pro-box', function (e) {
        e.preventDefault();
        $('#search-result-product').css('display', 'block');
        const query = $(this).val().toLowerCase();
        let urlResource = '/admin/pos/search/products';
        if(query !== '') {
            callAjax(urlResource, 'GET', {
                param: query
            })
                .done(response => {
                    $('#search-result-product').html(response);
                })
                .fail(error => {
                    console.log(error)
                })
        } else {
            $('#search-result-product').val('');
            $('#search-result-product').css('display', 'none');
        }
    });

    // click append product to carts
    var cart = [];
    var ids = [];
    $(document).on('click', '#product-on-pos', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResource = '/admin/pos/buy/' + id + '/products';
        let find = $('tbody#pro_search_append').find('tr').length;
        callAjax(urlResource, 'GET').done(response => {
            let valueOrder = 1;
            if (find <= 0) {
                cart.push(response.data);
                ids.push(response.data.id);
                result =
                    `<tr id="product_pos_${response.data.id}" data-id="${response.data.id}">
                            <input type="hidden" id="order-option"
                            data-product-amount="${response.data.product_amount}"
                            data-product-amount-inventory="${response.data.product_amount_inventory}"
                            data-product-inventory="${response.data.product_inventory}"
                            data-product-allow_negative="${response.data.product_allow_negative}"
                             />
                            <td>${ cart.length }</td>
                            <td>${response.data.product_code}</td>
                            <td>${response.data.product_name}</td>
                            <td><img width="50" height="50" src="${response.data.product_image_url}" alt="${response.data.product_name}"></td>
                            <td><input type="number" value="1" min="1" max="${response.data.product_amount}" id="amount-order" style="width: 50px"/></td>
                            <td id="sell-price" data-price="${response.data.product_sell_price}">${response.data.product_sell_price}</td>
                            <td id="total-money">${parseInt(response.data.product_sell_price)}</td>
                            <td class="text-center">
                            <i class="fa fa-trash-o" style="color: darkred;" id="delete-product-pos" data-id="${response.data.id}" title="Xóa"></i>
                            </td>
                     </tr>`;

                $('#pro_search_append').append(result);

                let total_money = 0;
                $('tbody#pro_search_append tr').each(function () {
                    let quantity_product = $(this).find('input#amount-order').val();
                    let price = $(this).find('td#sell-price').text();
                    total = parseInt(price) * parseInt(quantity_product);
                    total_money += total;
                    $('#money').attr('data-money', total_money);
                    $('#money').html(total_money);
                    $('.total-after-discount').html(total_money);
                    $('.total-after-discount').attr('data-total-money', total_money);
                });
            } else {
                let check = ids.indexOf(id);
                if (check === -1) {
                    cart.push(response.data);
                    ids.push(response.data.id);
                    result = `<tr id="product_pos_${response.data.id}" data-id="${response.data.id}">
                                    <input type="hidden" id="order-option"
                                    data-product-amount="${response.data.product_amount}"
                                    data-product-amount-inventory="${response.data.product_amount_inventory}"
                                    data-product-inventory="${response.data.product_inventory}"
                                    data-product-allow_negative="${response.data.product_allow_negative}"
                                    />
                                    <td>${ ids.length }</td>
                                    <td>${response.data.product_code}</td>
                                    <td>${response.data.product_name}</td>
                                    <td><img width="50" height="50" src="${response.data.product_image_url}" alt="${response.data.product_name}"></td>
                                    <td><input type="number" value="1" min="1" max="${response.data.product_amount}" id="amount-order" style="width: 50px"/></td>
                                    <td id="sell-price" data-price="${response.data.product_sell_price}">${response.data.product_sell_price}</td>
                                    <td id="total-money">${parseInt(response.data.product_sell_price)}</td>
                                    <td class="text-center">
                                    <i class="fa fa-trash-o" style="color: darkred;" id="delete-product-pos" data-id="${response.data.id}" title="Xóa"></i>
                                    </td>
                               </tr>`;

                    $('#pro_search_append').append(result);

                    let total_money = 0;
                    $('tbody#pro_search_append tr').each(function () {
                        let quantity_product = $(this).find('input#amount-order').val();
                        let price = $(this).find('td#sell-price').text();
                        total = parseInt(price) * parseInt(quantity_product);
                        total_money += total;
                        $('#money').attr('data-money', total_money);
                        $('#money').html(total_money);
                        $('.total-after-discount').html(total_money);
                        $('.total-after-discount').attr('data-total-money', total_money);
                    });
                } else {
                    $('tbody#pro_search_append tr').each(function (value, key) {
                        let idTemp = $(this).data('id');
                        if (response.data.id == idTemp) {
                            let valueOrder = parseInt($(`#product_pos_${response.data.id} td input#amount-order`).val());
                            let product_amount_inventory = $(`#product_pos_${response.data.id} input#order-option`).attr('data-product-amount-inventory');
                            let product_inventory = $(`#product_pos_${response.data.id} input#order-option`).attr('data-product-inventory');
                            let product_allow_negative = $(`#product_pos_${response.data.id} input#order-option`).attr('data-product-allow_negative');
                            if (parseInt(product_inventory) === 1 && parseInt(product_allow_negative) === 1 && parseInt(valueOrder) === parseInt(response.data.product_amount)) {
                                $('#alert-cms-error').css('display', 'block');
                                $('#text-alert-error').text(`Sản phẩm trong kho chỉ còn ${response.data.product_amount} sp`);
                                setTimeout(function () {
                                    $('#alert-cms-error').css('display', 'none');
                                }, 2000)
                            } else if (parseInt(product_inventory) === 1 && parseInt(product_allow_negative) === 0 && parseInt(valueOrder) === (parseInt(response.data.product_amount) - parseInt(product_amount_inventory))) {
                                $('#alert-cms-error').css('display', 'block');
                                $('#text-alert-error').text(`Sản phẩm trong kho chỉ còn ${(parseInt(response.data.product_amount) - parseInt(product_amount_inventory))} sp`);
                                setTimeout(function () {
                                    $('#alert-cms-error').css('display', 'none');
                                }, 2000)
                            } else if (parseInt(product_inventory) === 0 && parseInt(product_allow_negative) === 0 && parseInt(valueOrder) === parseInt(response.data.product_amount)) {
                                $('#alert-cms-error').css('display', 'block');
                                $('#text-alert-error').text(`Sản phẩm trong kho chỉ còn ${response.data.product_amount} sp`);
                                setTimeout(function () {
                                    $('#alert-cms-error').css('display', 'none');
                                }, 2000)
                            } else {
                                $(`#product_pos_${response.data.id} td input#amount-order`).val(valueOrder + 1);
                                let amount = $(`#product_pos_${response.data.id} td input#amount-order`).val();
                                let price = $(`#product_pos_${response.data.id} td#sell-price`).attr('data-price');
                                let result = 0;
                                result = parseInt(amount) * parseInt(price);
                                $(`#product_pos_${response.data.id} td#total-money`).html(result);
                            }
                        }
                    });

                    let total_money = 0;
                    $('tbody#pro_search_append tr').each(function () {
                        let quantity_product = $(this).find('input#amount-order').val();
                        let price = $(this).find('td#sell-price').text();
                        total = parseInt(price) * parseInt(quantity_product);
                        total_money += total;
                        $('#money').attr('data-money', total_money);
                        $('#money').html(total_money);
                        $('.total-after-discount').html(total_money);
                        $('.total-after-discount').attr('data-total-money', total_money);
                    });
                }
            }
        }).fail(error => {
            console.log(error)
        })
    });

    // Total money
    $(document).on('change', '#amount-order', function (e) {
        $('tbody#pro_search_append tr').each(function (key, value) {
            let amount = $(this).find('td input#amount-order').val();
            let price = $(this).find('td#sell-price').attr('data-price');
            let product_amount_old = $(this).find('input#order-option').attr('data-product-amount');
            let product_amount_inventory = $(this).find('input#order-option').attr('data-product-amount-inventory');
            let product_inventory = $(this).find('input#order-option').attr('data-product-inventory');
            let product_allow_negative = $(this).find('input#order-option').attr('data-product-allow_negative');
            let result = 0;
            if (amount < 1) {
                $(this).find('td input#amount-order').val(1);
                result = price;
            } else if(parseInt(product_inventory) === 1 && parseInt(product_allow_negative) === 1 && parseInt(amount) > parseInt(product_amount_old)) {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text(`Sản phẩm trong kho chỉ còn ${product_amount_old} sp`);
                setTimeout(function () {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
                $(this).find('td input#amount-order').val(parseInt(product_amount_old));
                result = parseInt(product_amount_old) * parseInt(price);
            } else if (parseInt(product_inventory) === 1 && parseInt(product_allow_negative) === 0 && parseInt(product_amount_old) > parseInt(product_amount_inventory) && parseInt(amount) > (parseInt(product_amount_old) - parseInt(product_amount_inventory))) {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text(`Sản phẩm trong kho chỉ còn ${(parseInt(product_amount_old) - parseInt(product_amount_inventory))} sp`);
                setTimeout(function () {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
                $(this).find('td input#amount-order').val((parseInt(product_amount_old) - parseInt(product_amount_inventory)));
                result = parseInt((parseInt(product_amount_old) - parseInt(product_amount_inventory))) * parseInt(price);
            } else if (parseInt(product_inventory) === 1 && parseInt(product_allow_negative) === 0 && parseInt(product_amount_old) < parseInt(product_amount_inventory) && parseInt(amount) > parseInt(product_amount_old)) {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text(`Sản phẩm trong kho chỉ còn ${product_amount_old} sp`);
                setTimeout(function () {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
                $(this).find('td input#amount-order').val(parseInt(product_amount_old));
                result = parseInt(product_amount_old) * parseInt(price);
            } else if(parseInt(product_inventory) === 0 && parseInt(product_allow_negative) === 0 && parseInt(amount) > parseInt(product_amount_old)) {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text(`Sản phẩm trong kho chỉ còn ${product_amount_old} sp`);
                setTimeout(function () {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
                $(this).find('td input#amount-order').val(parseInt(product_amount_old));
                result = parseInt(product_amount_old) * parseInt(price);
            } else {
                result = parseInt(amount) * parseInt(price);
            }
            $(this).find('td#total-money').html(result);
        });

        let total_money = 0;
        $('tbody#pro_search_append tr').each(function () {
            let quantity_product = $(this).find('input#amount-order').val();
            let price = $(this).find('td#sell-price').text();
            total = parseInt(price) * parseInt(quantity_product);
            total_money += total;
            $('#money').attr('data-money', total_money);
            $('#money').html(total_money);
            $('.total-after-discount').html(total_money);
            $('.total-after-discount').attr('data-total-money', total_money);
        });
    });

    // Delete item
    $(document).on('click', '#delete-product-pos', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let price = $(`tr#product_pos_${id}`).find('td#total-money').text();
        $(`tr#product_pos_${id}`).remove();
        let totalMoney = $('.total-after-discount').attr('data-total-money');
        let money = $('#money').attr('data-money');
        total = parseInt(money) - parseInt(price);
        total_money = parseInt(totalMoney) - parseInt(price);
        $('#money').attr('data-money', total);
        $('#money').html(total);
        $('.total-after-discount').html(total_money);
        $('.total-after-discount').attr('data-total-money', total_money);
        cart.forEach(function(value, key) {
            if ( cart[key].id === id) {
                cart.splice(key, 1);
            }
            if(ids[key] === id) {
                ids.splice(key, 1)
            }
        })
    })

    // Discount
    $(document).on('keyup', '#discount-order', function (e) {
        e.preventDefault();
        let value = $(this).val() > 0 ? $(this).val() : 0;
        let totalMoney = $('#money').attr('data-money');
        let totalValue = 0;
        if(parseInt(value) > 100) {
            $('#alert-cms-error').css('display', 'block');
            $('#text-alert-error').text("Giảm giá tối đã 100%");
        } else {
            totalValue = parseInt(totalMoney) - (parseInt(totalMoney) * parseInt(value) / 100);
            $('.total-after-discount').attr('data-total-money', totalValue);
            $('.total-after-discount').html(totalValue);
            $('#alert-cms-error').css('display', 'none');
        }
    })

    // Lack
    $(document).on('keyup', '.customer-pay', function (e) {
        e.preventDefault();
        let value = $('.customer-pay').val() > 0 ? $('.customer-pay').val() : 0;
        let totalMoney = $('.total-after-discount').attr('data-total-money');
        let lack = 0;
        if(parseInt(value) < parseInt(totalMoney)) {
            $('#alert-cms-error').css('display', 'block');
            $('#text-alert-error').text("Khách đưa phải lớn hơn tổng tiền");
        } else {
            lack = parseInt(value) - parseInt(totalMoney);
            $('#lack').attr('data-lack', lack);
            $('#lack').html(lack);
            $('#alert-cms-error').css('display', 'none');
        }
    })

    // save Cart to Order
    let amountProduct = [];
    $(document).on('click', '#btn-save-order', function (e) {
        e.preventDefault();
        let customer_value = $('#search-box-customer').val();
        let customer_id = $('#search-box-customer').data('id');
        let notes = $('#note-order').val();
        let sell_type = $('#sell_type:checked').val();
        let money = $('#money').attr('data-money');
        let coupon = $('#discount-order').val();
        let totalMoney = $('.total-after-discount').attr('data-total-money');
        let customerPay = $('.customer-pay').val() > 0 ? $('.customer-pay').val() : 0 ;
        let lack = $('#lack').attr('data-lack');
        $('tbody#pro_search_append tr').each(function (key, value) {
            let amount = $(this).find('td input#amount-order').val();
            amountProduct.push(amount);
            cart.forEach(function(value, key) {
                amountProduct.forEach(function(value, key) {
                    cart[key]['product_sell_amount'] = value
                })
            })
            console.log(cart);
        });

        let carts = cart;

        let urlResource = '/admin/orders/save-order';

        if(customer_value !== '' && cart.length > 0 && parseInt(customerPay) > parseInt(totalMoney)) {
            callAjax(urlResource, 'POST', {
                customer_id: customer_id,
                notes: notes ? notes : '',
                total_price: money,
                coupon: coupon ? (money * coupon / 100) : 0,
                total_money: totalMoney,
                customer_pay: customerPay ? customerPay : 0,
                lack: lack,
                sell_type: sell_type,
                order_detail: carts
            }).done(response => {
                localStorage.setItem('order_bill', response.orders.id);
                window.location.reload();
                $('#alert-cms-success').css('display', 'block');
                $('#text-alert-success').text("Tạo đơn hàng thành công");
                setTimeout(function() {
                    $('#alert-cms-success').css('display', 'none');
                }, 2000)
                amountProduct = [];
            }).fail(error => {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Tạo đơn hàng thất bại");
                setTimeout(function() {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            })
        } else {
            if(customer_value === '') {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Vui lòng nhập tên khách hàng");
                setTimeout(function() {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            } else if(cart.length < 0) {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Đơn hàng không được trống");
                setTimeout(function() {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            } else if(parseInt(customerPay) < parseInt(totalMoney)) {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Khách đưa phải lớn hơn tổng tiền");
                setTimeout(function() {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            }
        }
    })

    $(document).on('click', '#btn-save-print-order', function (e) {
        e.preventDefault();
        let orderId = localStorage.getItem('order_bill');
        if (!orderId) {
            $('#alert-cms-error').css('display', 'block');
            $('#text-alert-error').text("Vui lòng lưu lại đơn hàng trước khi thực hiện in hóa đơn");
            setTimeout(function() {
                $('#alert-cms-error').css('display', 'none');
            }, 2000)
        }
        let urlResource = '/admin/orders/print-order/' + orderId;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', urlResource, true);
        xhr.responseType = 'arraybuffer';
        xhr.onload = function () {
            if (this.status === 200) {
                var filename = "";
                var disposition = xhr.getResponseHeader('Content-Disposition');
                if (disposition && disposition.indexOf('attachment') !== -1) {
                    var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                    var matches = filenameRegex.exec(disposition);
                    if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                }
                var type = xhr.getResponseHeader('Content-Type');

                var blob;
                if (typeof File === 'function') {
                    try {
                        blob = new File([this.response], filename, { type: type });
                    } catch (e) { /* Edge */ }
                }
                if (typeof blob === 'undefined') {
                    blob = new Blob([this.response], { type: type });
                }

                if (typeof window.navigator.msSaveBlob !== 'undefined') {
                    // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
                    window.navigator.msSaveBlob(blob, filename);
                } else {
                    var URL = window.URL || window.webkitURL;
                    var downloadUrl = URL.createObjectURL(blob);

                    if (filename) {
                        // use HTML5 a[download] attribute to specify filename
                        var a = document.createElement("a");
                        // safari doesn't support this yet
                        if (typeof a.download === 'undefined') {
                            window.location.reload();
                            window.open(downloadUrl, '_blank');
                        } else {
                            a.href = downloadUrl;
                            a.download = filename;
                            document.body.appendChild(a);
                            a.click();
                        }
                    } else {
                        window.location.reload();
                        window.open(downloadUrl, '_blank');
                    }

                    setTimeout(function () { URL.revokeObjectURL(downloadUrl); }, 100); // cleanup
                }
            }
        };
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        xhr.send($.param({}));
    })
});
