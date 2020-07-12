jQuery(document).ready(function ($) {
    function loadSwalAlert(icon, title, message) {
        Swal.fire({
            icon: icon,
            title: title,
            text: message,
        });
    }

    // search supplier
    $(document).on('keyup', '#search-box-mas', function (e) {
        e.preventDefault();
        $('#mas-suggestion-box').css('display', 'block');
        const query = $(this).val().toLowerCase();
        let urlResource = '/admin/forms/search/suppliers';
        if(query !== '') {
            callAjax(urlResource, 'GET', {
                param: query
            })
                .done(response => {
                    $('#mas-suggestion-box').html(response);
                })
                .fail(error => {
                    console.log(error);
                })
        } else {
            $('#mas-suggestion-box').val('');
            $('#mas-suggestion-box').css('display', 'none');
        }
    });

    $(document).on('click', '#supplier-on-import', function (e) {
        e.preventDefault();
        let supplierName = $(this).attr('data-name');
        let supplierCode = $(this).attr('data-code');
        let supplierId = $(this).attr('data-id');
        $('#search-box-mas').val(supplierCode + ' - ' + supplierName);
        $('#search-box-mas').attr('data-id', supplierId);
        $('#mas-suggestion-box').css('display', 'none');
    });

    $(document).on('click', '#close-form-supplier', function() {
        $('#search-box-mas').val('');
    })

    // search product
    $(document).on('keyup', '#search-pro-box', function (e) {
        e.preventDefault();
        $('#search-result-product').css('display', 'block');
        const query = $(this).val().toLowerCase();
        let urlResource = '/admin/forms/search/products';
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
        let urlResource = '/admin/forms/buy/' + id + '/products';
        let find = $('tbody#pro_search_append').find('tr').length;
        callAjax(urlResource, 'GET').done(response => {
            let valueOrder = 1;
            if (find <= 0) {
                cart.push(response.data);
                ids.push(response.data.id);
                result =
                    `<tr id="product_pos_${response.data.id}" data-id="${response.data.id}">
                            <td>${ cart.length }</td>
                            <td>${response.data.product_code}</td>
                            <td>${response.data.product_name}</td>
                            <td><img width="50" height="50" src="${response.data.product_image_url}" alt="${response.data.product_name}"></td>
                            <td><input type="number" value="1" id="amount-order" style="width: 50px"/></td>
                            <td id="sell-price" data-price="${response.data.product_origin_price}">${response.data.product_origin_price}</td>
                            <td id="total-money">${parseInt(response.data.product_origin_price)}</td>
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
                                    <td>${ ids.length }</td>
                                    <td>${response.data.product_code}</td>
                                    <td>${response.data.product_name}</td>
                                    <td><img width="50" height="50" src="${response.data.product_image_url}" alt="${response.data.product_name}"></td>
                                    <td><input type="number" value="1" id="amount-order" style="width: 50px"/></td>
                                    <td id="sell-price" data-price="${response.data.product_origin_price}">${response.data.product_origin_price}</td>
                                    <td id="total-money">${parseInt(response.data.product_origin_price)}</td>
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
                            $(`#product_pos_${response.data.id} td input#amount-order`).val(valueOrder + 1);
                            let amount = $(`#product_pos_${response.data.id} td input#amount-order`).val();
                            let price = $(`#product_pos_${response.data.id} td#sell-price`).attr('data-price');
                            let result = 0;
                            result = parseInt(amount) * parseInt(price);
                            $(`#product_pos_${response.data.id} td#total-money`).html(result);
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
            let result = 0;
            if (amount < 1) {
                $(this).find('td input#amount-order').val(1);
                result = price;
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
        if(parseInt(value) > parseInt(totalMoney)) {
            $('#alert-cms-error').css('display', 'block');
            $('#text-alert-error').text("Giảm giá phải nhỏ hơn thành tiền");
        } else {
            totalValue = parseInt(totalMoney) - parseInt(value);
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
    let product_sell_amount = 0;
    $(document).on('click', '#btn-save-import', function (e) {
        e.preventDefault();
        alert("aaa")
        let supplier_value = $('#search-box-mas').val();
        let supplier_id = $('#search-box-mas').data('id');
        let input_date = $('#input-date').val();
        let notes = $('#note-import').val();
        let sell_type = $('#sell_type:checked').val();
        let money = $('#money').attr('data-money');
        let coupon = $('#discount-order').val();
        let totalMoney = $('.total-after-discount').attr('data-total-money');
        let pairPay = $('.customer-pay').val() > 0 ? $('.customer-pay').val() : 0 ;
        let lack = $('#lack').attr('data-lack');
        $('tbody#pro_search_append tr').each(function (key, value) {
            let amount = $(this).find('td input#amount-order').val();
            amountProduct.push(amount);
            cart.forEach(function(value, key) {
                amountProduct.forEach(function(value, key) {
                    cart[key]['product_sell_amount'] = value
                })
            })
        });

        let carts = cart;

        let urlResource = '/admin/forms/create-receipt';

        if(supplier_value !== '' && cart.length > 0 && parseInt(pairPay) > parseInt(totalMoney)) {
            callAjax(urlResource, 'POST', {
                supplier_id: supplier_id,
                input_date: input_date,
                notes: notes ? notes : '',
                total_price: money,
                discount: coupon ? coupon : 0,
                total_money: totalMoney,
                pair_pay: pairPay ? pairPay : 0,
                lack: lack,
                input_status: sell_type,
                import_detail: carts
            }).done(response => {
                // window.location.reload();
                $('#alert-cms-success').css('display', 'block');
                $('#text-alert-success').text("Tạo phiếu nhập thành công");
                setTimeout(function() {
                    $('#alert-cms-success').css('display', 'none');
                }, 2000)
                amountProduct = [];
            }).fail(error => {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Tạo phiếu nhập kho thất bại");
                setTimeout(function() {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            })
        } else {
            if(supplier_value === '') {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Vui lòng nhập tên nhà cung cấp");
                setTimeout(function() {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            } else if(cart.length < 0) {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Sản phẩm cần nhập không được trống");
                setTimeout(function() {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            } else if(parseInt(pairPay) < parseInt(totalMoney)) {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Khách đưa phải lớn hơn tổng tiền");
                setTimeout(function() {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            }
        }
    })

    let amountProduct1 = [];
    $(document).on('click', '#btn-save-print-order', function (e) {
        e.preventDefault()
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
            amountProduct1.push(amount);
            cart.forEach(function(value, key) {
                amountProduct1.forEach(function(value, key) {
                    cart[key]['product_sell_amount'] = value
                })
            })
        });

        let carts = cart;

        let urlResource = '/admin/forms/print-order';

        if(customer_value !== '' && cart.length > 0 && parseInt(customerPay) > parseInt(totalMoney)) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', urlResource, true);
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
                                window.location.href = downloadUrl;
                            } else {
                                a.href = downloadUrl;
                                a.download = filename;
                                document.body.appendChild(a);
                                a.click();
                            }
                        } else {
                            window.location.href = downloadUrl;
                        }

                        setTimeout(function () { URL.revokeObjectURL(downloadUrl); }, 100); // cleanup
                    }
                }
            };
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
            xhr.send($.param({
                customer_id: customer_id,
                notes: notes ? notes : '',
                total_price: money,
                coupon: coupon ? coupon : 0,
                total_money: totalMoney,
                customer_pay: customerPay ? customerPay : 0,
                lack: lack,
                status: sell_type,
                order_detail: carts
            }));
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

    // create purchar orders
    let amountProduct2 = [];
    $(document).on('click', '#btn-save-purchase', function (e) {
        e.preventDefault();
        let supplier_value = $('#search-box-mas').val();
        let supplier_id = $('#search-box-mas').data('id');
        let pur_order_date = $('#input-date').val();
        let notes = $('#note-import').val();
        let money = $('#money').attr('data-money');
        $('tbody#pro_search_append tr').each(function (key, value) {
            let amount = $(this).find('td input#amount-order').val();
            amountProduct2.push(amount);
            cart.forEach(function(value, key) {
                amountProduct2.forEach(function(value, key) {
                    cart[key]['product_sell_amount'] = value
                })
            })
        });

        let carts = cart;

        let urlResource = '/admin/forms/store-purchase-order';

        if(supplier_value !== '' && cart.length > 0) {
            callAjax(urlResource, 'POST', {
                supplier_id: supplier_id,
                pur_order_date: pur_order_date,
                notes: notes ? notes : '',
                total_price: money,
                pur_order_detail: carts
            }).done(response => {
                // window.location.reload();
                $('#alert-cms-success').css('display', 'block');
                $('#text-alert-success').text("Tạo đơn mua hàng thành công");
                setTimeout(function() {
                    $('#alert-cms-success').css('display', 'none');
                }, 2000)
                amountProduct2 = [];
            }).fail(error => {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Tạo đơn mua hàng thất bại");
                setTimeout(function() {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            })
        } else {
            if(supplier_value === '') {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Vui lòng nhập tên nhà cung cấp");
                setTimeout(function() {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            } else if(cart.length < 0) {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Sản phẩm cần nhập không được trống");
                setTimeout(function() {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            }
        }
    })

    $(document).on('change', '#search-pur-order', function(e) {
        e.preventDefault();
        let purOrderId = $(this).val();

        let urlResource = '/admin/forms/show-product-by-purchase-order/' + purOrderId;
        callAjax(urlResource, 'GET').done(response => {
            $('#input').html(response);
        }).fail(error => {
            console.log(error);
        })
    })

    $(document).on('change', '#amount-input', function (e) {
        $('tbody#pro_on_pur_order tr').each(function (key, value) {
            let amount_ship = $('#amount-ship').val();
            let amount = $(this).find('td input#amount-input').val();
            let price = $(this).find('td#origin-price').attr('data-price');
            let result = 0;
            if (amount < 1) {
                $(this).find('td input#amount-input').val(1);
                result = price;
            } else {
                result = parseInt(amount) * parseInt(price);
            }
            $(this).find('td#total-money-input').html(result);
        });

        let total_money = 0;
        $('tbody#pro_on_pur_order tr').each(function () {
            let quantity_product = $(this).find('input#amount-input').val();
            let price = $(this).find('td#origin-price').attr('data-price');
            total = parseInt(price) * parseInt(quantity_product);
            total_money += total;
            $('#money').attr('data-money', total_money);
            $('#money').html(total_money);
            $('.total-after-discount').html(total_money);
            $('.total-after-discount').attr('data-total-money', total_money);
        });
    });

      // save Cart to Order
      let amountProduct3 = [];
      $(document).on('click', '#btn-save-input', function (e) {
          e.preventDefault();
          $('tbody#pro_on_pur_order tr').each(function () {
            let id = $(this).attr('data-id');
            let product_code = $(this).find('td#product-code').attr('data-code');
            let product_name = $(this).find('td#product-name').attr('data-name');
            let amount_get = $(this).find('input#amount-get').attr('data-amount-get');
            let amount_ship = $(this).find('input#amount-ship').val();
            let amount_input = $(this).find('input#amount-input').val();
            let origin_price = $(this).find('td#origin-price').attr('data-price');
            let total_money_input = $(this).find('td#total-money-input').text();

            let objCart = {
                id: id,
                product_code: product_code,
                product_name: product_name,
                amount_get: amount_get,
                amount_ship: amount_ship,
                amount_input: amount_input,
                origin_price: origin_price,
                total_money_input: total_money_input
            }

            cart.push(objCart)
        });

          let supplier_id = $('#search-box-mas').data('id');
          let input_date = $('#input-date').val();
          let notes = $('#note-import').val();
          let money = $('#money').attr('data-money');
          let pur_order_id = $('#search-pur-order').val();
          $('tbody#pro_on_pur_order tr').each(function (key, value) {
              let amount = $(this).find('td input#amount-input').val();
              amountProduct3.push(amount);
              cart.forEach(function(value, key) {
                  amountProduct3.forEach(function(value, key) {
                      cart[key]['product_sell_amount'] = value
                  })
              })
          });

          let carts = cart;

          let urlResource = '/admin/forms/store-input';

          if(cart.length > 0) {
              callAjax(urlResource, 'POST', {
                  pur_order_id: pur_order_id,
                  supplier_id: supplier_id,
                  input_date: input_date,
                  notes: notes ? notes : '',
                  total_price: money,
                  import_detail: carts
              }).done(response => {
                  // window.location.reload();
                  $('#alert-cms-success').css('display', 'block');
                  $('#text-alert-success').text("Tạo phiếu nhập thành công");
                  setTimeout(function() {
                      $('#alert-cms-success').css('display', 'none');
                  }, 2000)
                  amountProduct = [];
              }).fail(error => {
                  $('#alert-cms-error').css('display', 'block');
                  $('#text-alert-error').text("Tạo phiếu nhập kho thất bại");
                  setTimeout(function() {
                      $('#alert-cms-error').css('display', 'none');
                  }, 2000)
              })
          } else {
              if(supplier_value === '') {
                  $('#alert-cms-error').css('display', 'block');
                  $('#text-alert-error').text("Vui lòng nhập tên nhà cung cấp");
                  setTimeout(function() {
                      $('#alert-cms-error').css('display', 'none');
                  }, 2000)
              } else if(cart.length < 0) {
                  $('#alert-cms-error').css('display', 'block');
                  $('#text-alert-error').text("Sản phẩm cần nhập không được trống");
                  setTimeout(function() {
                      $('#alert-cms-error').css('display', 'none');
                  }, 2000)
              } else if(parseInt(pairPay) < parseInt(totalMoney)) {
                  $('#alert-cms-error').css('display', 'block');
                  $('#text-alert-error').text("Khách đưa phải lớn hơn tổng tiền");
                  setTimeout(function() {
                      $('#alert-cms-error').css('display', 'none');
                  }, 2000)
              }
          }
      })

      $(document).on('change', '#search-input-war', function(e) {
        e.preventDefault();
        let inputId = $(this).val();

        let urlResource = '/admin/forms/show-product-by-input/' + inputId;
        callAjax(urlResource, 'GET').done(response => {
            $('#input').html(response);
        }).fail(error => {
            console.log(error);
        })
    })

    // save Cart to Order
    let amountProduct4 = [];
    $(document).on('click', '#btn-save-bill', function (e) {
        e.preventDefault();
        $('tbody#pro_on_input tr').each(function () {
          let id = $(this).attr('data-id');
          let product_code = $(this).find('td#product-code').attr('data-code');
          let product_name = $(this).find('td#product-name').attr('data-name');
          let amount_bill = $(this).find('input#amount-bill').val();
          let product_origin_price = $(this).find('td#origin-price').attr('data-price');
          let total_money_bill = $(this).find('td#total-money-bill').text();

          let objCart = {
              id: id,
              product_code: product_code,
              product_name: product_name,
              amount_bill: amount_bill,
              product_origin_price: product_origin_price,
              total_money_bill: total_money_bill
          }

          cart.push(objCart)
      });

        let supplier_id = $('#search-box-mas').data('id');
        let bill_date = $('#bill-date').val();
        let notes = $('#note-bill').val();
        let money = $('#money').attr('data-money');
        let input_id = $('#search-input-war').val();
        $('tbody#pro_on_input tr').each(function (key, value) {
            let amount = $(this).find('td input#amount-bill').val();
            amountProduct4.push(amount);
            cart.forEach(function(value, key) {
                amountProduct4.forEach(function(value, key) {
                    cart[key]['product_sell_amount'] = value
                })
            })
        });

        let carts = cart;

        let urlResource = '/admin/forms/store-bill-order';

        if(cart.length > 0) {
            callAjax(urlResource, 'POST', {
                input_id: input_id,
                supplier_id: supplier_id,
                bill_date: bill_date,
                notes: notes ? notes : '',
                total_price: money,
                bill_detail: carts
            }).done(response => {
                // window.location.reload();
                $('#alert-cms-success').css('display', 'block');
                $('#text-alert-success').text("Tạo phiếu nhập thành công");
                setTimeout(function() {
                    $('#alert-cms-success').css('display', 'none');
                }, 2000)
                amountProduct = [];
            }).fail(error => {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Tạo phiếu nhập kho thất bại");
                setTimeout(function() {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            })
        } else {
            if(supplier_value === '') {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Vui lòng nhập tên nhà cung cấp");
                setTimeout(function() {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            } else if(cart.length < 0) {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Sản phẩm cần nhập không được trống");
                setTimeout(function() {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            } else if(parseInt(pairPay) < parseInt(totalMoney)) {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Khách đưa phải lớn hơn tổng tiền");
                setTimeout(function() {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            }
        }
    })
});
