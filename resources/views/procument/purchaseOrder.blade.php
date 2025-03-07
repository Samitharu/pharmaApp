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
            <div style="border: 2px solid black; border-radius: 15px; padding: 20px; margin: 10px 0;">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Supplier</label>
                        <select name="cmbSupplier" id="cmbSupplier" class="form-select"></select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Pack Size</label>
                        <input type="text" name="txtPackSize" id="txtPackSize" class="form-control" placeholder="Enter pack size">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Generic Name</label>
                        <input type="text" name="txtGenericName" id="txtGenericName" class="form-control" placeholder="Enter Generic / Drug Name">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Brand Name</label>
                        <input type="text" name="txtBrandName" id="txtBrandName" class="form-control" placeholder="Enter Brand Name">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="txtQuantity" id="txtQuantity" class="form-control" placeholder="Enter Quantity">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Price</label>
                        <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Enter Price">
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Div -->
        <div class="col-4">
            <div style="border: 2px solid black; border-radius: 15px; padding: 20px; margin: 10px 0;">
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
            <div style="border: 2px solid black; border-radius: 15px; padding: 20px; margin: 10px 0;">
                <h5 class="text-center">Product Details</h5>
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Item Code</th>
                            <th>Item Name</th>
                            <th>Qty</th>
                            <th>FOC</th>
                            <th>Pack Size</th>
                            <th>Purchase Price</th>
                            <th>Wholesale Price</th>
                            <th>Retail Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" placeholder="Item Code"></td>
                            <td><input type="text" class="form-control" placeholder="Item Name"></td>
                            <td><input type="number" class="form-control" placeholder="Qty"></td>
                            <td><input type="number" class="form-control" placeholder="FOC"></td>
                            <td><input type="text" class="form-control" placeholder="Pack Size"></td>
                            <td><input type="text" class="form-control" placeholder="Purchase Price"></td>
                            <td><input type="text" class="form-control" placeholder="Wholesale Price"></td>
                            <td><input type="text" class="form-control" placeholder="Retail Price"></td>
                            <td><input type="button" class="btn btn-danger btn-sm" value="Remove"></td>
                        </tr>
                        <!-- Additional rows can be added dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>


            </div>



    </body>
    <script src="{{ asset('asset/js/master/purchaseOrder.js') }}"></script>
</x-app-layout>

</html>