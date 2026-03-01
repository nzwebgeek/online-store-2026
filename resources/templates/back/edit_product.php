<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SB Admin - Modern Bootstrap 5</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body>
        <!-- Page Content -->

            <div class="container-fluid px-2 mt-4">
                <h1 class="mb-4">Edit Product</h1>

                <form action="" method="post" enctype="multipart/form-data" class="row g-3">

                    <!-- Main Content -->
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="product-title" class="form-label">Product Title</label>
                            <input type="text" name="product_title" id="product-title" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="product-description" class="form-label">Product Description</label>
                            <textarea name="product_description" id="product-description" rows="6" class="form-control"></textarea>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="product-price" class="form-label">Product Price</label>
                            <input type="number" name="product_price" id="product-price" class="form-control">
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <aside class="col-lg-4">
                        <div class="mb-3 d-flex gap-2">
                            <input type="submit" name="draft" class="btn btn-warning w-50" value="Draft">
                            <input type="submit" name="publish" class="btn btn-primary w-50" value="Publish">
                        </div>

                        <div class="mb-3">
                            <label for="product-category" class="form-label">Product Category</label>
                            <select name="product_category" id="product-category" class="form-select">
                                <option value="">Select Category</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="product-brand" class="form-label">Product Brand</label>
                            <select name="product_brand" id="product-brand" class="form-select">
                                <option value="">Select Brand</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="product-tags" class="form-label">Product Keywords</label>
                            <input type="text" name="product_tags" id="product-tags" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="product-image" class="form-label">Product Image</label>
                            <input type="file" name="file" id="product-image" class="form-control">
                        </div>
                    </aside>

                </form>

            </div>

   