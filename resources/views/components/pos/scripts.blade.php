@push('scripts')
<script>
    var ids = [];
    function addProductToCart(productId, variationId) {
        $.ajax({
            url: '/single/product/' + productId +'/'+ variationId,
            method: 'GET',
            dataType: 'json',
            success: function(product) {
                let variationOptions = '';
                var index = ids.indexOf(product.id);
                flus = index != -1 ? true : false;
                $(".data option:selected").removeAttr("selected");
                if (flus) {
                    var q = $("#proQuantity-" + product.id).val();
                    $("#proQuantity-" + product.id).val(parseInt(q) + 1);
                    proMultiPur(product.id);
                }
                else{
                    let row = `
                        <tr data-id="${product.id}" id="pro-${product.id}">
                            <td colspan="2">
                                <span class="font-weight-bold text-info-800">${product.name}</span>
                                <input type="hidden" name="product_ids[]" value="${product.id}">
                                <input type="hidden" name="variation_ids[]" value="${product.variation_id}">
                            </td>
                            <td>
                                <div class="counter-container">
                                    <button class="counter-button" type="button" class="decrement" onclick="decrementQuantity(${product.id})">-</button>
                                    <input id="proQuantity-${product.id}" name="proQuantity[]" type="text" class="quantity" value="1" onchange="proMultiPur(${product.id})">
                                    <button class="counter-button" type="button" onclick="incrementQuantity(${product.id})" class="increment">+</button>
                                </div>
                            </td>
                            <td>
                                <input name="unit_price[]" type="text"step="0.01" class="form-control quantity-total" id="proUnitPrice-${product.id}" value="${product.selling_price}">
                            </td>
                            <td>
                                <input name="sub_total[]" type="text"step="0.01" class="form-control quantity-total" id="proSubPrice-${product.id}" value="${product.selling_price}">
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-danger" onclick="removeProductPur(${product.id})"><i class=" icon icon-cross3"></i></button>
                            </td>
                        </tr>`;
                    $('#productTbody').append(row);
                    ids.push(product.id);
                    totalPur();
                    updateHiddenFields();
                }
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
        const total_price = $('#totalPrice').text();
        const payable_amount = $('#payable_amount').text();
        const total_quantity = $('#total').text();
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
@endpush