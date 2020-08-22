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
                window.location.reload();
                $('#alert-cms-success').css('display', 'block');
                $('#text-alert-success').text("Tạo phiếu yêu cầu nhập hàng thành công");
                setTimeout(function() {
                    $('#alert-cms-success').css('display', 'none');
                }, 2000)
                amountProduct2 = [];
            }).fail(error => {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Tạo phiếu yêu cầu nhập hàng thất bại");
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

    // delete purchase order
    $(document).on("click", "#btn-delete-pur-order", function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResource = '/admin/forms/' + id + '/purchase-order/';
        callAjax(urlResource, 'DELETE')
            .done(response => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.value) {
                        $("#purchase-order_" + id).remove();
                        window.location.reload();
                        $('#alert-cms-success').css('display', 'block');
                        $('#text-alert-success').text("Xóa thành công");
                        setTimeout(function () {
                            $('#alert-cms-success').css('display', 'none');
                        }, 2000)
                    }
                })
            })
            .fail(error => {
                console.log(error)
            })
    });

    // delete Multi record
    $(document).on("click", "#delete-multi-pur-order", function (e) {
        e.preventDefault();
        let ids = [];
        $('#pur_order_ids:checked').each(function (i) {
            ids.push($(this).attr('data-ids'));
        });
        if (ids.length == 0) {
            Swal.fire(
                'Cant Delete!',
                'Chọn bản ghi cần xóa.',
                'error'
            );
        } else {
            let urlResouce = '/admin/forms/' + ids + '/purchase-order/';
            callAjax(urlResouce, 'DELETE')
                .done(response => {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                    }).then((result) => {
                        if (result.value) {
                            $.each(ids, function (key, value) {
                                $("#purchase-order_" + value).remove();
                            });
                            window.location.reload();
                            $('#alert-cms-success').css('display', 'block');
                            $('#text-alert-success').text("Xóa thành công");
                            setTimeout(function () {
                                $('#alert-cms-success').css('display', 'none');
                            }, 2000)
                        }
                    })
                })
                .fail(error => {
                    console.log(error);
                })
        }
    });

    // search purchase order
    $(document).on('click', '#btn-search-pur-order', function (e) {
        e.preventDefault();
        let orderCode = $('#pur-order-search-code').val();
        let orderFromDate = $("#datepicker1").val();
        let orderToDate = $("#datepicker2").val();
        let urlResource = '/admin/forms/search/purchase-order/'
        callAjax(urlResource, 'GET',
            {
                order_code: orderCode.toLowerCase(),
                order_date_from: orderFromDate,
                order_date_to: orderToDate
            })
            .done(response => {
                $('#list-purchase-orders').html(response);
            })
            .fail(error => {
                console.log(error);
            })
    })

    // search purchase order
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

    // change status purchase order
    $(document).on('click', '#purchase-status', function (e) {
        e.preventDefault();
        let purOrderId = $(this).data('id');
        let data = $(this).val();

        let urlResource = '/admin/forms/' + purOrderId + '/update-status-purchase-order';
        callAjax(urlResource, 'PATCH', {
            data: data
        }).done(response => {
            window.location.reload();
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
            result = parseInt(amount) * parseInt(price);
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

      // save input
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
                  window.location.reload();
                  $('#alert-cms-success').css('display', 'block');
                  $('#text-alert-success').text("Tạo phiếu nhập kho thành công");
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

    // delete input
    $(document).on("click", "#btn-delete-input", function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResource = '/admin/forms/' + id + '/input/';
        callAjax(urlResource, 'DELETE')
            .done(response => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.value) {
                        $("#input_" + id).remove();
                        window.location.reload();
                        $('#alert-cms-success').css('display', 'block');
                        $('#text-alert-success').text("Xóa thành công");
                        setTimeout(function () {
                            $('#alert-cms-success').css('display', 'none');
                        }, 2000)
                    }
                })
            })
            .fail(error => {
                console.log(error)
            })
    });

    // delete Multi record
    $(document).on("click", "#delete-multi-input", function (e) {
        e.preventDefault();
        let ids = [];
        $('#input_ids:checked').each(function (i) {
            ids.push($(this).attr('data-ids'));
        });
        if (ids.length == 0) {
            Swal.fire(
                'Cant Delete!',
                'Chọn bản ghi cần xóa.',
                'error'
            );
        } else {
            let urlResouce = '/admin/forms/' + ids + '/input/';
            callAjax(urlResouce, 'DELETE')
                .done(response => {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                    }).then((result) => {
                        if (result.value) {
                            $.each(ids, function (key, value) {
                                $("#input_" + value).remove();
                            });
                            window.location.reload();
                            $('#alert-cms-success').css('display', 'block');
                            $('#text-alert-success').text("Xóa thành công");
                            setTimeout(function () {
                                $('#alert-cms-success').css('display', 'none');
                            }, 2000)
                        }
                    })
                })
                .fail(error => {
                    console.log(error);
                })
        }
    });

    // search input
    $(document).on('click', '#btn-search-input', function (e) {
        e.preventDefault();
        let orderCode = $('#input-search-code').val();
        let orderFromDate = $("#datepicker1").val();
        let orderToDate = $("#datepicker2").val();
        let urlResource = '/admin/forms/search/input/'
        callAjax(urlResource, 'GET',
            {
                order_code: orderCode.toLowerCase(),
                order_date_from: orderFromDate,
                order_date_to: orderToDate
            })
            .done(response => {
                $('#list-inputs').html(response);
            })
            .fail(error => {
                console.log(error);
            })
    })

    // update status input
    $(document).on('click', '#input-status', function (e) {
        e.preventDefault();
        let inputId = $(this).data('id');
        let data = $(this).val();

        let urlResource = '/admin/forms/' + inputId + '/update-status-input';
        callAjax(urlResource, 'PATCH', {
            data: data
        }).done(response => {
            window.location.reload();
        }).fail(error => {
            console.log(error);
        })
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

    // save Bill Purchase
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
        let sell_type = $('#sell_type:checked').val();
        let coupon = $('#discount-order').val();
        let totalMoney = $('.total-after-discount').attr('data-total-money');
        let pairPay = $('.customer-pay').val() > 0 ? $('.customer-pay').val() : 0;
        let lack = $('#lack').attr('data-lack');

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
                sell_type: sell_type,
                total_price: money,
                coupon: coupon,
                total_money: totalMoney,
                pair_pay: pairPay,
                lack: lack,
                bill_detail: carts
            }).done(response => {
                window.location.reload();
                $('#alert-cms-success').css('display', 'block');
                $('#text-alert-success').text("Tạo hóa đơn mua thành công");
                setTimeout(function() {
                    $('#alert-cms-success').css('display', 'none');
                }, 2000)
                amountProduct = [];
            }).fail(error => {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Tạo hóa đơn mua kho thất bại");
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

    // delete bill order
    $(document).on("click", "#btn-delete-bill-order", function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResource = '/admin/forms/' + id + '/bill-order/';
        callAjax(urlResource, 'DELETE')
            .done(response => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.value) {
                        $("#bill-order_" + id).remove();
                        window.location.reload();
                        $('#alert-cms-success').css('display', 'block');
                        $('#text-alert-success').text("Xóa thành công");
                        setTimeout(function () {
                            $('#alert-cms-success').css('display', 'none');
                        }, 2000)
                    }
                })
            })
            .fail(error => {
                console.log(error)
            })
    });

    // delete Multi record
    $(document).on("click", "#delete-multi-bill-order", function (e) {
        e.preventDefault();
        let ids = [];
        $('#bill_order_ids:checked').each(function (i) {
            ids.push($(this).attr('data-ids'));
        });
        if (ids.length == 0) {
            Swal.fire(
                'Cant Delete!',
                'Chọn bản ghi cần xóa.',
                'error'
            );
        } else {
            let urlResouce = '/admin/forms/' + ids + '/bill-order/';
            callAjax(urlResouce, 'DELETE')
                .done(response => {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                    }).then((result) => {
                        if (result.value) {
                            $.each(ids, function (key, value) {
                                $("#bill-order_" + value).remove();
                            });
                            window.location.reload();
                            $('#alert-cms-success').css('display', 'block');
                            $('#text-alert-success').text("Xóa thành công");
                            setTimeout(function () {
                                $('#alert-cms-success').css('display', 'none');
                            }, 2000)
                        }
                    })
                })
                .fail(error => {
                    console.log(error);
                })
        }
    });

    // search bill order
    $(document).on('click', '#btn-search-bill-order', function (e) {
        e.preventDefault();
        let orderCode = $('#bill-order-search-code').val();
        let orderFromDate = $("#datepicker1").val();
        let orderToDate = $("#datepicker2").val();
        let urlResource = '/admin/forms/search/bill-order/'
        callAjax(urlResource, 'GET',
            {
                order_code: orderCode.toLowerCase(),
                order_date_from: orderFromDate,
                order_date_to: orderToDate
            })
            .done(response => {
                $('#list-bill-orders').html(response);
            })
            .fail(error => {
                console.log(error);
            })
    })

    // update status bill order
    $(document).on('click', '#update-status-bill-order', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResource = '/admin/forms/' + id + '/update-status-bill-order';
        callAjax(urlResource, 'GET')
            .done(response => {
                window.location.reload();
            })
            .fail(error => {
                console.log(error);
            })
    })

    // bill out stock
    let amountProduct5 = [];
    $(document).on('click', '#btn-save-out-stock', function (e) {
        e.preventDefault();
        let supplier_value = $('#search-box-mas').val();
        let supplier_id = $('#search-box-mas').data('id');
        let out_stock_date = $('#input-date').val();
        let notes = $('#note-import').val();
        let money = $('#money').attr('data-money');
        $('tbody#pro_search_append tr').each(function (key, value) {
            let amount = $(this).find('td input#amount-order').val();
            amountProduct5.push(amount);
            cart.forEach(function (value, key) {
                amountProduct5.forEach(function (value, key) {
                    cart[key]['product_sell_amount'] = value
                })
            })
        });

        let carts = cart;

        let urlResource = '/admin/forms/store-bill-out-stock';

        if (supplier_value !== '' && cart.length > 0) {
            callAjax(urlResource, 'POST', {
                supplier_id: supplier_id,
                out_stock_date: out_stock_date,
                notes: notes ? notes : '',
                total_price: money,
                out_stock_detail: carts
            }).done(response => {
                window.location.reload();
                $('#alert-cms-success').css('display', 'block');
                $('#text-alert-success').text("Tạo phiếu xuất kho thành công");
                setTimeout(function () {
                    $('#alert-cms-success').css('display', 'none');
                }, 2000)
                amountProduct5 = [];
            }).fail(error => {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Tạo phiếu xuất kho thất bại");
                setTimeout(function () {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            })
        } else {
            if (supplier_value === '') {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Vui lòng nhập tên nhà cung cấp");
                setTimeout(function () {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            } else if (cart.length < 0) {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Sản phẩm cần nhập không được trống");
                setTimeout(function () {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            }
        }
    })

    // delete bill out stock
    $(document).on("click", "#btn-delete-bill-out-stock", function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResource = '/admin/forms/' + id + '/bill-out-stock/';
        callAjax(urlResource, 'DELETE')
            .done(response => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.value) {
                        $("#bill_out_stock_" + id).remove();
                        window.location.reload();
                        $('#alert-cms-success').css('display', 'block');
                        $('#text-alert-success').text("Xóa thành công");
                        setTimeout(function () {
                            $('#alert-cms-success').css('display', 'none');
                        }, 2000)
                    }
                })
            })
            .fail(error => {
                console.log(error)
            })
    });

    // delete Multi record
    $(document).on("click", "#delete-multi-out-stock", function (e) {
        e.preventDefault();
        let ids = [];
        $('#bill_out_stock_ids:checked').each(function (i) {
            ids.push($(this).attr('data-ids'));
        });
        if (ids.length == 0) {
            Swal.fire(
                'Cant Delete!',
                'Chọn bản ghi cần xóa.',
                'error'
            );
        } else {
            let urlResouce = '/admin/forms/' + ids + '/bill-out-stock/';
            callAjax(urlResouce, 'DELETE')
                .done(response => {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                    }).then((result) => {
                        if (result.value) {
                            $.each(ids, function (key, value) {
                                $("#bill_out_stock_" + value).remove();
                            });
                            window.location.reload();
                            $('#alert-cms-success').css('display', 'block');
                            $('#text-alert-success').text("Xóa thành công");
                            setTimeout(function () {
                                $('#alert-cms-success').css('display', 'none');
                            }, 2000)
                        }
                    })
                })
                .fail(error => {
                    console.log(error);
                })
        }
    });

    // search bill out stock
    $(document).on('click', '#btn-search-bill-out-stock', function (e) {
        e.preventDefault();
        let orderCode = $('#bill-out-stock-search-code').val();
        let orderFromDate = $("#datepicker1").val();
        let orderToDate = $("#datepicker2").val();
        let urlResource = '/admin/forms/search/bill-out-stock/'
        callAjax(urlResource, 'GET',
            {
                bill_out_stock_code: orderCode.toLowerCase(),
                bill_out_stock_date_from: orderFromDate,
                bill_out_stock_date_to: orderToDate
            })
            .done(response => {
                $('#list-bill-out-stocks').html(response);
            })
            .fail(error => {
                console.log(error);
            })
    })
    // end

    // update status bill out stock
    $(document).on('click', '#bill-out-stock-status', function (e) {
        e.preventDefault();
        let billOutStockId = $(this).data('id');
        let data = $(this).val();

        let urlResource = '/admin/forms/' + billOutStockId + '/update-status-bill-outstock';
        callAjax(urlResource, 'PATCH', {
            data: data
        }).done(response => {
            window.location.reload();
        }).fail(error => {
            console.log(error);
        })
    })


    // search order on bill exchange
    $(document).on('change', '#search-input-ord', function (e) {
        e.preventDefault();
        let orderId = $(this).val();

        let urlResource = '/admin/forms/show-product-by-order/' + orderId;
        callAjax(urlResource, 'GET').done(response => {
            $('#exchange').html(response);
        }).fail(error => {
            console.log(error);
        })
    })

    // create bill exchange
    let amountProduct6 = [];
    $(document).on('click', '#btn-save-bill-exchange', function (e) {
        e.preventDefault();
        $('tbody#pro_on_input tr').each(function () {
            let id = $(this).attr('data-id');
            let product_code = $(this).find('td#product-code').attr('data-code');
            let product_name = $(this).find('td#product-name').attr('data-name');
            let amount_bill = $(this).find('input#amount-bill').val();
            let product_origin_price = $(this).find('td#sell-price').attr('data-price');
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

        let customer_value = $('#search-box-customer').val();
        let customer_id = $('#search-box-customer').data('id');
        let exchange_date = $('#bill-exchange-date').val();
        let notes = $('#note-exchange').val();
        let money = $('#money').attr('data-money');
        let order_id = $('#search-input-ord').val();
        let pairPay = $('#money-refund').attr('data-refund');

        $('tbody#pro_on_input tr').each(function (key, value) {
            let amount = $(this).find('td input#amount-bill').val();
            amountProduct6.push(amount);
            cart.forEach(function (value, key) {
                amountProduct6.forEach(function (value, key) {
                    cart[key]['product_sell_amount'] = value
                })
            })
        });

        let carts = cart;

        let urlResource = '/admin/forms/store-bill-exchange';

        if (cart.length > 0) {
            callAjax(urlResource, 'POST', {
                order_id: order_id,
                customer_id: customer_id,
                exchange_date: exchange_date,
                exchange_reason: notes ? notes : '',
                exchange_price: money,
                exchange_refund: pairPay,
                exchange_detail: carts
            }).done(response => {
                window.location.reload();
                $('#alert-cms-success').css('display', 'block');
                $('#text-alert-success').text("Tạo phiếu đổi trả thành công");
                setTimeout(function () {
                    $('#alert-cms-success').css('display', 'none');
                }, 2000)
                amountProduct6 = [];
            }).fail(error => {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Tạo phiếu đổi trả thất bại");
                setTimeout(function () {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            })
        } else {
            if (customer_value === '') {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Vui lòng nhập tên nhà cung cấp");
                setTimeout(function () {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            } else if (cart.length < 0) {
                $('#alert-cms-error').css('display', 'block');
                $('#text-alert-error').text("Sản phẩm cần nhập không được trống");
                setTimeout(function () {
                    $('#alert-cms-error').css('display', 'none');
                }, 2000)
            }
        }
    });

    // delete bill out stock
    $(document).on("click", "#btn-delete-bill-exchange", function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResource = '/admin/forms/' + id + '/bill-exchange/';
        callAjax(urlResource, 'DELETE')
            .done(response => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.value) {
                        $("#bill_exchange_" + id).remove();
                        window.location.reload();
                        $('#alert-cms-success').css('display', 'block');
                        $('#text-alert-success').text("Xóa thành công");
                        setTimeout(function () {
                            $('#alert-cms-success').css('display', 'none');
                        }, 2000)
                    }
                })
            })
            .fail(error => {
                console.log(error)
            })
    });

    // delete Multi record
    $(document).on("click", "#delete-multi-exchange", function (e) {
        e.preventDefault();
        let ids = [];
        $('#bill_exchange_ids:checked').each(function (i) {
            ids.push($(this).attr('data-ids'));
        });
        if (ids.length == 0) {
            Swal.fire(
                'Cant Delete!',
                'Chọn bản ghi cần xóa.',
                'error'
            );
        } else {
            let urlResouce = '/admin/forms/' + ids + '/bill-exchange/';
            callAjax(urlResouce, 'DELETE')
                .done(response => {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                    }).then((result) => {
                        if (result.value) {
                            $.each(ids, function (key, value) {
                                $("#bill_exchange_" + value).remove();
                            });
                            window.location.reload();
                            $('#alert-cms-success').css('display', 'block');
                            $('#text-alert-success').text("Xóa thành công");
                            setTimeout(function () {
                                $('#alert-cms-success').css('display', 'none');
                            }, 2000)
                        }
                    })
                })
                .fail(error => {
                    console.log(error);
                })
        }
    });

    // search bill exchange
    $(document).on('click', '#btn-search-bill-exchange', function (e) {
        e.preventDefault();
        let orderCode = $('#bill-exchange-search-code').val();
        let orderFromDate = $("#datepicker1").val();
        let orderToDate = $("#datepicker2").val();
        let urlResource = '/admin/forms/search/bill-exchange/'
        callAjax(urlResource, 'GET',
            {
                bill_exchange_code: orderCode.toLowerCase(),
                bill_exchange_date_from: orderFromDate,
                bill_exchange_date_to: orderToDate
            })
            .done(response => {
                $('#list-bill-exchanges').html(response);
            })
            .fail(error => {
                console.log(error);
            })
    })
    // end
});
