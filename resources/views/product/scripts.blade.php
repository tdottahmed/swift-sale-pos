@push('scripts')
<script>

    $(document).ready(function() {
        // These codes for generate unique sku
        function generateSKU() {
            return Math.floor(10000000 + Math.random() * 90000000).toString();
        }

        function checkSKU(sku, callback) {
            $.ajax({
                url: '{{ route("check.sku") }}',
                type: 'POST',
                data: {
                    sku: sku,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    callback(response.exists);
                }
            });
        }

        function generateUniqueSKU() {
            let sku = generateSKU();
            checkSKU(sku, function(exists) {
                if (exists) {
                    generateUniqueSKU();
                } else {
                    $('#sku').val(sku);
                }
            });
        }
       
        generateUniqueSKU();
        $(document).on('click', '.generate-sku', function() {
            generateUniqueSKU();
        });
        //generate unique sku end

        // Codes for calculate purchase price selling price and profit mergin
        function calculateAndSetValues() {
            let purchasePriceInc = parseFloat($('#purchase_price').val()) || 0;
            let profitMargin = parseFloat($('#profit_margin').val()) || 0;
            let sellingPrice = parseFloat($('#selling_price').val()) || 0;

            if (this.id === 'profit_margin' || this.id === 'purchase_price') {
                sellingPrice = purchasePriceInc + (purchasePriceInc * (profitMargin / 100));
                $('#selling_price').val(sellingPrice.toFixed(2));
            } else if (this.id === 'selling_price') {
                profitMargin = ((sellingPrice - purchasePriceInc) / purchasePriceInc) * 100;
                $('#profit_margin').val(profitMargin.toFixed(
                2));
            }
        }

        $('#purchase_price, #profit_margin, #selling_price').on('change', calculateAndSetValues);
        $(document).ready(function() {
            function calculateVariationSetValues(context) {
                let $row = $(context).closest('tr');
                let purchasePriceInc = parseFloat($row.find('.variation_purchase_price').val()) || 0;
                let profitMargin = parseFloat($row.find('.variation_profit_margin').val()) || 0;
                let sellingPrice = parseFloat($row.find('.variation_selling_price').val()) || 0;

                if ($(context).hasClass('variation_purchase_price') || $(context).hasClass(
                        'variation_profit_margin')) {
                    sellingPrice = purchasePriceInc + (purchasePriceInc * (profitMargin / 100));
                    $row.find('.variation_selling_price').val(sellingPrice.toFixed(
                    2));
                } else if ($(context).hasClass('variation_selling_price')) {
                    profitMargin = ((sellingPrice - purchasePriceInc) / purchasePriceInc) * 100;
                    $row.find('.variation_profit_margin').val(profitMargin.toFixed(
                    2));
                }
            }

            $(document).on('change',
                '.variation_purchase_price, .variation_profit_margin, .variation_selling_price',
                function() {
                    calculateVariationSetValues(this);
                });
        });
        //calculate purchase price selling price and profit mergin End


        //Populating Variation product
        function getVariationRowHtml() {
            return `<tr>
                        <td>
                            <select class="form-control select select-search variation-name" name="child[variation_name][]">
                                <option value="">Select Variable</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control select select-search variation-values" name="child[variation_value][]">
                                <option value="">Select Value</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="form-control variation_purchase_price" name="child[purchase_price][]" placeholder="Inc. Tax">
                        </td>
                        <td>
                            <input type="text" class="form-control variation_profit_margin" name="child[profit_margin][]" placeholder="25%">
                        </td>
                        <td>
                            <input type="text" class="form-control variation_selling_price" name="child[selling_price][]" placeholder="Exc. Tax">
                        </td>
                        <td>
                            <input type="number" class="form-control" name="child[stock][]" placeholder="Stock">
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm rounded-round btn-icon bg-danger-800 shadow remove-row">
                                <i class="icon-cross"></i>
                            </button>
                        </td>
                    </tr>`;
        }

        function loadVariables() {
            let url = "{{ route('variables.index') }}";
            return $.ajax({
                url: url,
                type: 'GET',
            });
        }

        function populateVariationOptions(selectElement, response) {
            let options = '<option value="">Select Variable</option>';
            $.each(response, function(index, variable) {
                options += `<option value="${variable.title}" data-id="${variable.id}">${variable.title}</option>`;
            });
            selectElement.html(options);
        }

        function populateValuesOptions(variableId, response) {
            let selectedVariable = response.find(variable => variable.id == variableId);
            if (selectedVariable && selectedVariable.values) {
                let valuesArray = JSON.parse(selectedVariable.values);
                let valuesOptions = '<option value="">Select Value</option>';
                valuesArray.forEach(value => {
                    valuesOptions += `<option value="${value}">${value}</option>`;
                });
                return valuesOptions;
            }
            return '<option value="">No Values Available</option>';
        }

        $('#manage_stock').on('change', function() {
            if ($(this).is(':checked')) {
                $('#alert_qty_wrapper').removeClass('d-none');
            } else {
                $('#alert_qty_wrapper').addClass('d-none');
            }
        });

        $('#galaryImageWrapper').hide();
        $('#manage_galery').on('change', function() {
            if ($(this).is(':checked')) {
                $('#galaryImageWrapper').show();
            } else {
                $('#galaryImageWrapper').hide();
            }
        });

        $('#single_product_wrapper').show();
        $('#product_variation_wrapper, #product_variable_wrapper').hide();
        $('#product_type').on('change', function() {
            var selectedType = $(this).val();
            if (selectedType === 'variable') {
                $('#single_product_wrapper').hide();
                $('#product_variation_wrapper, #product_variable_wrapper').show();

                let html = getVariationRowHtml();
                $('#multiple_variation').append(html);

                loadVariables().done(function(response) {
                    let $newRowSelect = $('#multiple_variation tr:last-child .variation-name');
                    populateVariationOptions($newRowSelect, response);
                }).fail(function(xhr) {
                    console.error('Error fetching variables:', xhr);
                });

            } else {
                $('#single_product_wrapper').show();
                $('#product_variation_wrapper, #product_variable_wrapper').hide();
            }
        });
        $(document).on('change', '.variation-name', function() {
            let selectedOption = $(this).find('option:selected');
            let variableId = selectedOption.data('id');
            let $row = $(this).closest('tr');
            loadVariables().done(function(response) {
                let valuesOptions = populateValuesOptions(variableId, response);
                $row.find('.variation-values').html(valuesOptions);
            }).fail(function(xhr) {
                console.error('Error fetching variable values:', xhr);
            });
        });

        $('#variation_add').click(function() {
            let html = getVariationRowHtml();
            $('#multiple_variation').append(html);

            loadVariables().done(function(response) {
                let $newRowSelect = $('#multiple_variation tr:last-child .variation-name');
                populateVariationOptions($newRowSelect, response);
            }).fail(function(xhr) {
                console.error('Error fetching variables:', xhr);
            });
        });


        $(document).on('click', '.remove-row', function() {
            if (confirm("Are you sure you want to delete this row?")) {
                $(this).closest('tr').remove();
            }
        });
        //Populating Variation product end
    });
</script>
@endpush