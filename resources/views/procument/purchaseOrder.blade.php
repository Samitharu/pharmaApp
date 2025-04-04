<meta name="csrf-token" content="{{ csrf_token() }}">
<x-app-layout>

    <body class="bg-gray-800 text-dark">
        <div class="container mt-5">

            <div class="container">
                <h2 class="mb-4">Purchase Order</h2>
            </div>
            <div class="container mt-4">
                <div class="container mt-4">
                    <div class="row">
                        <!-- First Div -->
                        <div class="col-8">
                            <div class="shadow-lg rounded-lg p-5 bg-white my-3">

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Supplier</label>
                                        <select name="cmbSupplier" id="cmbSupplier" class="form-select"></select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <x-server-date id="expectedDate" name="expectedDate" label="Expected Date" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <x-payment-method-select-tag />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Discount</label>
                                        <input type="text" name="txtDiscount" id="txtDiscount" class="form-control numeric" placeholder="Enter discount">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Second Div -->
                        <div class="col-4">
                            <div id="summaryBox" class="shadow-lg rounded-lg p-5 bg-white my-3 summary-box">
                                <h5 class="text-center">Summary</h5>
                                <div class="d-flex justify-content-between">
                                    <label class="form-label">Gross Total:</label>
                                    <span id="grossTotal">0.00</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <label class="form-label">Discount:</label>
                                    <span id="discount">0.00</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <label class="form-label">Net Total:</label>
                                    <span id="netTotal">0.00</span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Third Div with Editable Table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="shadow-lg rounded-lg p-5 bg-white my-3">
                                <div class="flex items-center justify-between mb-3">
                                    <x-row-count-badge tableId="transactionTable" />
                                    <x-table-search tableId="transactionTable" />
                                </div>

                                <h5 class="text-center">Product Details</h5>

                                @php
                                $columns = ['Barcode','Item Code', 'Item Name', 'Qty', 'FOC', 'Pack Size', 'Purchase Price', 'Wholesale Price', 'Retail Price','Value', 'Action'];

                                $rows = [
                                [
                                'Barcode' => ['type' => 'text', 'placeholder' => 'Scan Barcode', 'class' => 'barcode-input' ,'oninput' => 'fetchItemDetails(event)'],
                                'Item Code' => ['type' => 'text', 'placeholder' => 'Item Code', 'class' => 'item-code', 'onfocus' => 'showItemSearchModal("itemSearchModal",this)'],
                                'Item Name' => ['type' => 'text', 'placeholder' => 'Item Name', 'class' => 'item-name'],
                                'Qty' => ['type' => 'number', 'placeholder' => 'Qty', 'class' => 'qty'],
                                'FOC' => ['type' => 'number', 'placeholder' => 'FOC'],
                                'Pack Size' => ['type' => 'text', 'placeholder' => 'Pack Size', 'class' => 'pack-size'],
                                'Purchase Price' => ['type' => 'text', 'placeholder' => 'Purchase Price', 'class' => 'purchase-price'],
                                'Wholesale Price' => ['type' => 'text', 'placeholder' => 'Wholesale Price', 'class' => 'wholesale-price'],
                                'Retail Price' => ['type' => 'text', 'placeholder' => 'Retail Price', 'class' => 'retail-price'],
                                'Value' => ['type' => 'text', 'placeholder' => 'Value', 'class' => 'value'],
                                'Action' => '<button type="button" class="btn btn-danger btn-sm remove-item">Remove</button>',
                                ]
                                ];
                                @endphp

                                <x-transactions-item-table :columns="$columns" :rows="$rows" />



                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>



    </body>

</x-app-layout>
<x-ItemPopUpSearch id="itemSearchModal" title="Search Products" size="modal-lg" searchingTable="productSearchTable">

    <div class="p-3">
        <!-- Search Input -->
        <!-- <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search products..."> -->


        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-hover" id="productSearchTable">
                <thead class="table-dark">
                    <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Pack Size</th>
                        <th>Avl Qty</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="productTable">
                    <!-- Data will be dynamically inserted here -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-center" id="pagination">
                <!-- Pagination items will be generated dynamically -->
            </ul>
        </nav>
    </div>
    <x-slot name="footer">

    </x-slot>
</x-ItemPopUpSearch>
<script src="{{ asset('asset/js/procument/purchaseOrder.js') }}"></script>
<script src="{{ asset('asset/js/common/common.js') }}" defer></script>

</html>