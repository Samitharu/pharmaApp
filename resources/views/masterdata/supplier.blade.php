<meta name="csrf-token" content="{{ csrf_token() }}">
<x-app-layout>

    <body class="bg-light text-dark">
        <div class="container mt-5">
            <div class="d-flex justify-content-start mb-3">
                <button id="btnItemCreateNew" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#supplierModal">Create New</button>
            </div>

            <div class="container">
                <h2 class="mb-4">Supplier List</h2>

                <table id="supplierListTable" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>
                                <span class="flex items-center">
                                    Supplier Code
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Supplier Name
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Primary Contact No
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Address
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>


            </div>

            <!-- Bootstrap Modal -->
            <div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="supplierModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="supplierModalLabel">Add New Supplier</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Supplier Code</label>
                        <input type="text" class="form-control rounded-3" placeholder="Enter supplier code">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Supplier Name</label>
                        <input type="text" class="form-control rounded-3" placeholder="Enter supplier name">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea class="form-control rounded-3" rows="3" placeholder="Enter supplier address"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact Number</label>
                    <input type="text" class="form-control rounded-3" placeholder="Enter contact number">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="btnSaveSupplier">Save</button>
            </div>
        </div>
    </div>
</div>

        </div>



    </body>
    <script src="{{ asset('asset/js/master/supplier.js') }}"></script>
</x-app-layout>

</html>