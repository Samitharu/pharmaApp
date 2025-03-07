
<meta name="csrf-token" content="{{ csrf_token() }}">
<x-app-layout>

    <body class="bg-light text-dark">
        <div class="container mt-5">
            <div class="d-flex justify-content-start mb-3">
                <button id="btnItemCreateNew" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#productModal">Create New</button>
            </div>

            <div class="container">
                <h2 class="mb-4">Product List</h2>
                <table id="productListTable" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Supplier</th>
                            <th>Purchase Price</th>
                            <th>Wholesale Price</th>
                            <th>Retail Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
            </div>

            <!-- Bootstrap Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="productModalLabel">Add New Product</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Tabs Navigation -->
                            <ul class="nav nav-tabs" id="productTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">General</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab">Settings</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pring-tab" data-bs-toggle="tab" data-bs-target="#pricing" type="button" role="tab">Prices</button>
                                </li>
                            </ul>

                            <div class="tab-content mt-3" id="productTabsContent">
                                <!-- General Tab -->
                                <div class="tab-pane fade show active" id="general" role="tabpanel">
                                    <div class="row g-4">
                                        <div class="col-md-4">
                                            <label class="form-label">Thumbnail</label>
                                            <div class="border p-4 text-center rounded-3">
                                                <input type="file" id="imageUpload" accept="image/*" class="d-none">
                                                <label for="imageUpload" class="d-block cursor-pointer">
                                                    <img id="preview" class="img-fluid d-none rounded-3" alt="Image Preview">
                                                    <span class="text-muted">Click to upload an image</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Product Code</label>
                                                    <input type="text" class="form-control rounded-3" placeholder="Enter product code">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Product Name</label>
                                                    <input type="text" class="form-control rounded-3" placeholder="Enter product name">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Supplier</label>
                                                    <select name="cmbSupplier" id="cmbSupplier" class="form-select">

                                                    </select>
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
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control rounded-3" rows="3" placeholder="Enter product description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Settings Tab -->
                                <div class="tab-pane fade" id="settings" role="tabpanel">
                                    <div class="row g-4 mt-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Status</label>
                                            <select class="form-select rounded-3">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Barcode</label>
                                            <input type="text" class="form-control " id="txtBarcode">
                                        </div>
                                    </div>

                                    <div class="row g-4 mt-3">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="chkFreeOfferAllowed">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Free Offer Allowed
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="chkDiscountAllowed">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Discount Allowed
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="chkManageBatch">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Manage Batch
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pring Tab -->
                                <div class="tab-pane fade" id="pricing" role="tabpanel">
                                    <div class="row g-4 mt-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Purchase Price</label>
                                            <input type="text" name="txtPurchasePrice" id="txtPurchasePrice" class="form-control price">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Whole Sale Price</label>
                                            <input type="text" name="txtWholeSale" id="txtwholeSale" class="form-control price">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Retail Price</label>
                                            <input type="text" name="txtRetail" id="txtRetail" class="form-control price">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" id="btnSaveProduct">Save</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </body>
    <script src="{{ asset('asset/js/master/product.js') }}"></script>
</x-app-layout>

</html>