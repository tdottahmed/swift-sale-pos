<script>
    var ids = [];
    function addProductToCart(productId) {
        $.ajax({
            url: '/single/product/' + productId,
            method: 'GET',
            dataType: 'json',
            success: function(product) {
                let variationOptions = '';
                product.variations.forEach(variation => {
                    variationOptions +=
                        `<option value="${variation.id}">${variation.product_variation}-${variation.value}</option>`;
                });
                let row = `
                    <tr data-id="${product.id}" id="pro-${product.id}">
                        <td>
                            ${product.name}
                            <input type="hidden" name="product_ids[]" value="${product.id}">
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-sm btn-outline-secondary" type="button" onclick="decrementQuantity(${product.id})">-</button>
                                </div>
                                <input id="proQuantity-${product.id}" class="form-control form-control-sm" type="number" min="1" onchange="proMultiPur(${product.id})" name="proQuantity[]" value="1">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-outline-secondary" type="button" onclick="incrementQuantity(${product.id})">+</button>
                                </div>
                            </div>

                        </td>
                        <td>
                            <select name="variation[]">
                                ${variationOptions}
                            </select>
                        </td>
                        <td>
                            <input name="unit_price[]" type="number"step="0.01" class="form-control" id="proUnitPrice-${product.id}" value="${product.selling_price}">
                        </td>
                        <td>
                            <input name="sub_total[]" type="number"step="0.01" class="form-control" id="proSubPrice-${product.id}" value="${product.selling_price}">
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger" onclick="removeProductPur(${product.id})">Delete</button>
                        </td>
                    </tr>`;
                $('#productTbody').append(row);
                ids.push(product.id);
                totalPur();
                updateHiddenFields();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    function totalPur() {
        var total = 0;
        var item = 0;
        $.each(ids, function(index, value) {
            var subPrice = parseFloat($(`#proSubPrice-${value}`).val());
            total += subPrice;
            var quantity = $(`#proQuantity-${value}`).val();
            item += parseInt(quantity);
        });
        $("#totalPrice").text(parseFloat(total));
        $("#total").text(parseInt(item));
        payableAmount();
        updateHiddenFields();
    }

    function proMultiPur(id) {
        var quantity = $(`#proQuantity-${id}`).val();
        var price = $(`#proUnitPrice-${id}`).val();
        var subPrice = quantity * price;
        $(`#proSubPrice-${id}`).val(subPrice);
        totalPur();
        updateHiddenFields();
    }

    function incrementQuantity(productId) {
        var quantityInput = $('#proQuantity-' + productId);
        var currentQuantity = parseInt(quantityInput.val());
        quantityInput.val(currentQuantity + 1);
        proMultiPur(productId);
        payableAmount();
        updateHiddenFields();
    }

    function decrementQuantity(productId) {
        var quantityInput = $('#proQuantity-' + productId);
        var currentQuantity = parseInt(quantityInput.val());
        if (currentQuantity > 1) {
            quantityInput.val(currentQuantity - 1);
            proMultiPur(productId);
        }
        payableAmount();
        updateHiddenFields();
    }

    $('#discountForm').on('submit', function(event) {
        event.preventDefault();
        let amount = $('#amountInput').val();
        let discountType = $('#discountType').val();
        let totalPrice = parseFloat($('#totalPrice').text());
        let discountAmount = 0;

        if (discountType === 'percent') {
            let discountPercentage = parseFloat(amount) / 100;
            discountAmount = totalPrice * discountPercentage;
        } else {
            discountAmount = parseFloat(amount);
        }

        $('#discountAmount').val(discountAmount.toFixed(2));
        $('#discountedAmmount').val(discountAmount);
        $('#createDiscount').modal('hide');
        payableAmount();
        updateHiddenFields();
    });

    function payableAmount() {
        let totalAmount = parseFloat($('#totalPrice').text());
        let discountAmount = parseFloat($('#discountAmount').val());
        let payableAmount;
        if (discountAmount > 0) {
            payableAmount = totalAmount - discountAmount;
        } else {
            payableAmount = totalAmount;
        }
        $('#payable_amount').text(payableAmount.toFixed(2));
    }

    function removeProductPur(id) {
        $("#pro-" + id).remove();
        var index = ids.indexOf(id);
        ids.splice(index, 1);
        totalPur();
        payableAmount();
        updateHiddenFields();
    }

    function updateHiddenFields() {
        const customer_id = $('#selected_customer').val();
        const total_price = $('#totalPrice').text();
        const payable_amount = $('#payable_amount').text();
        const total_quantity = $('#total').text();
        $('#customer_id').val(customer_id);
        $('#total_price').val(total_price);
        $('#paid_amount').val(payable_amount);
        $('#total_quantity').val(total_quantity);
    }

    $('#sellForm').on('submit', function(event) {
        updateHiddenFields();
        event.preventDefault();
        setTimeout(function() {
            window.open('', '_blank');
        }, 100);
            setTimeout(function() {
            location.reload();
        }, 200);
    });
</script>