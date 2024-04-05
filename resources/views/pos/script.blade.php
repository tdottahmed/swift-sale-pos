<script>
   $(document).ready(function() {       
        calculateCartTotal();
        payableAmount();         

        function addProductToCart(product) {
            let row = `<tr data-id="${product.id}">
                <td>${product.name}</td>
                <td>${product.sku}</td>
                <td>
                    <div class="input-group">
                        <button type="button" class="btn btn-sm btn-secondary decrement-quantity">-</button>
                        <span class="quantity mx-3 mt-1">${product.quantity}</span>
                        <button type="button" class="btn btn-sm btn-secondary increment-quantity">+</button>
                    </div>
                </td>
                <td>${product.subtotal}</td>
                <td>${product.total}</td>
                <td>
                    <button class="btn btn-sm btn-danger delete-product" data-id="${product.id}">Delete</button>
                </td>
            </tr>`;
            $('#productTable tbody').append(row);
        }

        $('#filteredProducts').on('click', 'tr', function() {
            let productName = $(this).find('td:eq(1)').text().trim(); 
            let price = $(this).find('td:eq(4)').text().trim(); 
            let initialTotal = price;
            let variationSku = $(this).find('td:eq(2)').text().trim();
            let existingRow = $('#productTable tr').find(`td:eq(1):contains("${variationSku}")`);
            if (existingRow.length > 0) {
                return false; 
            } else {
                let product = {
                    name: productName,
                    sku : variationSku,
                    quantity: 1, 
                    subtotal: price,
                    total: initialTotal,
                    id: $(this).data('productId')
                };
                addProductToCart(product);
                formData(product);
            }
            calculateCartTotal();
            payableAmount();
        });

        function calculateCartTotal() {
            let totalPrice = 0;
            let totalQuantity = 0;

            $('#productTable tbody tr').each(function() {
                let quantityElement = $(this).find('.quantity');
                let priceElement = $(this).find('td:eq(3)');

                if (quantityElement.length && priceElement.length) {
                    let quantity = parseInt(quantityElement.text());
                    let priceText = priceElement.text().trim().replace(/[^0-9.]/g, '');
                    let price = parseFloat(priceText);
                    let subtotal = quantity * price;
                    totalPrice += subtotal;
                    totalQuantity += quantity;
                } else {
                    console.warn('Missing quantity or price element in a cart row.');
                }
            });
            $('#cartTotalPrice').val(totalPrice.toFixed(2));
            $('#cartTotalQuantity').val(totalQuantity);
        }

        $('#productTable').on('click', '.increment-quantity, .decrement-quantity', function() {
            let quantitySpan = $(this).siblings('.quantity');
            let currentQuantity = parseInt(quantitySpan.text());
            let price = $(this).closest('tr').find('td:eq(3)').text().trim();
            let subtotalSpan = $(this).closest('tr').find('td:eq(4)'); 
            if (currentQuantity > 0 || $(this).hasClass('increment-quantity')) { 
                quantitySpan.text(currentQuantity + (($(this).hasClass('increment-quantity') ? 1 : -1)));
                let newSubtotal = parseFloat(price) * parseInt(quantitySpan.text());
                subtotalSpan.text(newSubtotal.toFixed(2));
            }
            calculateCartTotal();
            payableAmount();
        });

        function filterProducts() {
            var selectedCategory = $("#category").val();
            var selectedBrand = $("#brand").val();
            var sku = $("#sku").val().trim();
            $("#filteredProducts tr").hide().filter(function() {
                var categoryMatch = true;
                var brandMatch = true;
                var skuMatch = true;
                if (selectedCategory !== "") {
                    categoryMatch = $(this).data("category") === selectedCategory ||
                        selectedCategory === 'All';
                }
                if (selectedBrand !== "") {
                    brandMatch = $(this).data("brand") === selectedBrand;
                }
                if (sku !== "") {
                    var rowSKU = $(this).find('td:eq(2)').text().trim();
                    skuMatch = rowSKU.indexOf(sku) !== -1; 
                }
                return categoryMatch && brandMatch && skuMatch;
            }).show();
        }

        $('#productTable').on('click', '.delete-product', function() {
                    let rowToDelete = $(this).closest('tr');
                    rowToDelete.remove();
                    calculateCartTotal();
                    payableAmount();
                    updateFormData();

                });

        $("#filteredProducts tr").show();
        $("#category, #brand, #sku").on("change keyup", filterProducts);
        $('#productTable').on('click', '.increment-quantity, .decrement-quantity, .delete-product', function() {
            calculateCartTotal();
            payableAmount();
            updateFormData();
        });
        $('#productTable').on('click', '.increment-quantity, .decrement-quantity, .delete-product', calculateCartTotal);
        if ($('#cartTotalPrice').length && $('#cartTotalQuantity').length) {
            calculateCartTotal(); 
            payableAmount();
        }
        $('#productTable').append(`
            <tr>
                <td colspan="2"><strong>Total:</strong></td>
                <td colspan="2"><input type ="button" name="quantity" id="cartTotalQuantity" class="btn btn-outline btn-info" disabled/></td>
                <td colspan="2" ><input type ="button" name="totalPrice" id="cartTotalPrice" class="btn btn-outline" disabled/></td>
            </tr>
        `);

        $('#discountForm').on('submit', function(event) {
            event.preventDefault();
            let amount = $('#amountInput').val();
            let discountType = $('#discountType').val();
            let totalPrice = $('#cartTotalPrice').val();
            let totalPriceNumber = parseFloat(totalPrice);
            let discountAmount = 0;
            if (discountType === 'percent') {
                let discountPercentage = amount / 100;
                discountAmount = totalPriceNumber * discountPercentage;
            } else {
                discountAmount = parseFloat(amount);
            }
            $('#discountAmount').val(discountAmount.toFixed(2));
            $('#createDiscount').modal('hide'); // Assuming your modal ID is discountModal
            payableAmount();
            updateFormData();
        });

        function payableAmount() {
            let totalAmount = parseFloat($('#cartTotalPrice').val());
            let discountAmount = parseFloat($('#discountAmount').val());
            let payableAmount = totalAmount - discountAmount;
            $('#totalPayableAmount').text(payableAmount.toFixed(2));
            updateFormData();
        }

        function formData(product) {
            let quantity = parseInt(product.quantity);
            let subtotal = parseFloat(product.subtotal);
            let discountedAmount = $('#discountAmount').val();
            let totalAmount = $('#cartTotalPrice').val();
            let totalQuantity = $('#cartTotalQuantity').val();
            $('#product_sku').val(product.sku);
            $('#product_quantity').val(quantity);
            $('#product_subtotal').val(subtotal.toFixed(2));
            $('#discountedAmount').val(discountedAmount);
            $('#totalAmount').val(totalAmount);
            $('#totalQuantity').val(totalQuantity);
        }
        function updateFormData() {
            $('#product_sku').val('');
            $('#product_quantity').val('');
            $('#product_subtotal').val('');
            $('#PayableAmount').text();
            let discountedAmount = $('#discountAmount').val();
            let totalAmount = $('#cartTotalPrice').val();
            let totalQuantity = $('#cartTotalQuantity').val();
            let customer = $('#customer_id').val();
            $('#discountedAmount').val(discountedAmount);
            $('#totalAmount').val(totalAmount);
            $('#totalQuantity').val(totalQuantity);
            $('#customerId').val(customer);

            $('#productTable tbody tr').each(function(index) {
                let sku = $(this).find('td:eq(1)').text().trim();
                let quantity = $(this).find('.quantity').text().trim();
                let subtotal = $(this).find('td:eq(3)').text().trim();
                let total = $(this).find('td:eq(4)').text().trim();

                if (index > 0) {
                    $('#product_sku').val($('#product_sku').val() + ', ' + sku);
                    $('#product_quantity').val($('#product_quantity').val() + ', ' + quantity);
                    $('#product_subtotal').val($('#product_subtotal').val() + ', ' + subtotal);
                    $('#product_total').val($('#product_total').val() + ', ' + total);
                    $('#PayableAmount').val($('#totalPayableAmount').text());
                } else {
                    $('#product_sku').val(sku);
                    $('#product_quantity').val(quantity);
                    $('#product_subtotal').val(subtotal);
                    $('#product_total').val(total);
                }
            });
        }
        $('#saleForm').submit(function (e) {
            e.preventDefault();
            this.submit();
            setTimeout(function() {
                window.open('', '_blank');
            }, 100);
                setTimeout(function() {
                location.reload();
            }, 200);
        });
    });
</script>