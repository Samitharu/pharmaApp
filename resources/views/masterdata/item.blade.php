<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4 shadow-sm rounded-3">
            <h2 class="mb-3">Add New Product</h2>
           
            
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs" id="productTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">General</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="advance-tab" data-bs-toggle="tab" data-bs-target="#advance" type="button" role="tab">Advance</button>
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
                        <div class="mb-3">
                                <label class="form-label">Product Code</label>
                                <input type="text" class="form-control rounded-3" placeholder="Enter product code">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control rounded-3" placeholder="Enter product name">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Supplier</label>
                                <select name="cmbSupplier" id="cmbSupplier" class="form-select">

                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control rounded-3" rows="3" placeholder="Enter product description"></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <!-- Advance Tab -->
                <div class="tab-pane fade" id="advance" role="tabpanel">
                    <div class="row g-4 mt-3">
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select rounded-3">
                                <option>Published</option>
                                <option>Draft</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Base Price</label>
                            <input type="number" class="form-control rounded-3" placeholder="$132">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button class="btn btn-secondary rounded-3 me-2">Cancel</button>
                <button class="btn btn-primary rounded-3">Save</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('imageUpload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('preview');
                    img.src = e.target.result;
                    img.classList.remove('d-none');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
