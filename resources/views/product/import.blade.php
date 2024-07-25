<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Import Product Excel
        </x-slot>
        <x-slot name="body">
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('excel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="excel">Chose your Excel File</label>
                            <input type="file" name="excel" id="excel" class="file-input"
                                data-browse-class="btn btn-primary btn-block" data-show-remove="false"
                                data-show-caption="false" data-show-upload="false" data-fouc required>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-lg btn-block bg-indigo-600"><i
                                    class="icon-check mr-2"></i>Save</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <h2 class="text-center mb-4">Product Import Instructions</h2>
                    <a href="{{ asset('sample-structure.xlsx') }}" download="sample-structure.xlsx" class="btn bg-indigo-800 mb-4">Download Sample
                        Excel</a>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Column Number</th>
                                <th scope="col">Column Name</th>
                                <th scope="col">Instruction</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Product Name (Required)</td>
                                <td>Name of the product</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Brand </td>
                                <td>Name of the brand (If not found new brand with the given name will be created)</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Unit (Required)</td>
                                <td>Name of the unit</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Category </td>
                                <td>Name of the Category (If not found new category with the given name will be created)
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Sub-category </td>
                                <td>Name of the Sub-Category (If not found new sub-category with the given name under
                                    the parent Category will be created)</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>SKU </td>
                                <td>Product SKU. If blank an SKU will be automatically generated</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Barcode Type (Optional, Default: C128)</td>
                                <td>Barcode Type for the product. Currently supported: C128, C39, EAN-13, EAN-8, UPC-A,
                                    UPC-E, ITF-14</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Manage Stock? (Required)</td>
                                <td>Enable or disable stock management 1 = Yes 0 = No</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Alert quantity </td>
                                <td>Alert quantity</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Expires in </td>
                                <td>Product expiry period (Only in numbers)</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Expiry Period Unit </td>
                                <td>Unit for the expiry period. Available Options: days, months</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Applicable Tax </td>
                                <td>Name of the Tax Rate. If purchase Price (Excluding Tax) is not the same as Purchase
                                    Price (Including Tax) then you must supply the tax rate name.</td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>Selling Price Tax Type (Required)</td>
                                <td>Selling Price Tax Type. Available Options: inclusive, exclusive</td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td>Product Type (Required)</td>
                                <td>Product Type. Available Options: single, variable</td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>Variation Name (Required if product type is variable)</td>
                                <td>Name of the variation (Ex: Size, Color etc)</td>
                            </tr>
                            <tr>
                                <td>16</td>
                                <td>Variation Values (Required if product type is variable)</td>
                                <td>Values for the variation separated with '|' (Ex: Red|Blue|Green)</td>
                            </tr>
                            <tr>
                                <td>17</td>
                                <td>Variation SKUs </td>
                                <td>SKUs of each variation separated by '|' if product type is variable</td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td>Purchase Price (Including Tax) (Required if Purchase Price Excluding Tax is not
                                    given)</td>
                                <td>Purchase Price (Including Tax) (Only in numbers). For variable products '|'
                                    separated values with the same order as Variation Values (Ex: 84|85|88)</td>
                            </tr>
                            <tr>
                                <td>19</td>
                                <td>Purchase Price (Excluding Tax) (Required if Purchase Price Including Tax is not
                                    given)</td>
                                <td>Purchase Price (Excluding Tax) (Only in numbers). For variable products '|'
                                    separated values with the same order as Variation Values (Ex: 84|85|88)</td>
                            </tr>
                            <tr>
                                <td>20</td>
                                <td>Profit Margin % </td>
                                <td>Profit Margin (Only in numbers). If blank default profit margin for the business
                                    will be used</td>
                            </tr>
                            <tr>
                                <td>21</td>
                                <td>Selling Price </td>
                                <td>Selling Price (Only in numbers). If blank selling price will be calculated with the
                                    given Purchase Price and Applicable Tax</td>
                            </tr>
                            <tr>
                                <td>22</td>
                                <td>Opening Stock </td>
                                <td>Opening Stock (Only in numbers). For variable products separate stock quantities
                                    with '|'. (Ex: 100|150|200)</td>
                            </tr>
                            <tr>
                                <td>23</td>
                                <td>Opening stock location </td>
                                <td>If blank first business location will be used. Name of the business location</td>
                            </tr>
                            <tr>
                                <td>24</td>
                                <td>Expiry Date </td>
                                <td>Stock Expiry Date. Format: mm-dd-yyyy; Ex: 11-25-2018</td>
                            </tr>
                            <tr>
                                <td>25</td>
                                <td>Enable Product description, IMEI or Serial Number (Optional, Default: 0)</td>
                                <td>1 = Yes 0 = No</td>
                            </tr>
                            <tr>
                                <td>26</td>
                                <td>Weight </td>
                                <td>Optional</td>
                            </tr>
                            <tr>
                                <td>27</td>
                                <td>Rack </td>
                                <td>Rack details separated by '|' for different business locations serially. (Ex:
                                    R1|R5|R12)</td>
                            </tr>
                            <tr>
                                <td>28</td>
                                <td>Row </td>
                                <td>Row details separated by '|' for different business locations serially. (Ex:
                                    ROW1|ROW2|ROW3)</td>
                            </tr>
                            <tr>
                                <td>29</td>
                                <td>Position </td>
                                <td>Position details separated by '|' for different business locations serially. (Ex:
                                    POS1|POS2|POS3)</td>
                            </tr>
                            <tr>
                                <td>30</td>
                                <td>Image </td>
                                <td>Image name with extension. (Image name must be uploaded to the server
                                    public/uploads/img ) Or URL of the image</td>
                            </tr>
                            <tr>
                                <td>31</td>
                                <td>Product Description </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>36</td>
                                <td>Not for selling </td>
                                <td>1 = Yes 0 = No</td>
                            </tr>
                            <tr>
                                <td>37</td>
                                <td>Product locations </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
