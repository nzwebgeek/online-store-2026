<?php

if (isset($_GET['id'])) {
    $query = query("SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']) ." ");
    confirm($query);

    while($row = fetch_array($query)) {
        $product_title          = escape_string($row["product_title"]);
        $product_category_id       = escape_string($row["product_category_id"]);
        $product_price          = escape_string($row["product_price"]);
        $product_description    = escape_string($row["product_description"]);
        $short_desc             = escape_string($row["short_desc"]);
        $product_quantity       = escape_string($row["product_quantity"]);
        $product_image          = escape_string($row["product_image"]);
        $product_image = display_image($row['product_image']);

    
    }
    update_product();

}

?>



        <!-- Page Content -->
            <div class="container-fluid px-2 mt-4">
                <h1 class="mb-4">Edit Product</h1>

                <form action="" method="post" enctype="multipart/form-data" class="row g-3">

                    <!-- Main Content -->
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="product-title" class="form-label">Product Title</label>
                            <input type="text" name="product_title" id="product-title" class="form-control" value="<?php echo $product_title; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="product-description" class="form-label">Product Description</label>
                            <textarea name="product_description" id="product-description" rows="6" class="form-control"><?php echo $product_description; ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="product-description" class="form-label">Product Short Description</label>
                            <textarea name="short_desc" id="product-description" rows="3" class="form-control"><?php echo $short_desc; ?></textarea>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="product-price" class="form-label">Product Price</label>
                            <input type="number" name="product_price" id="product-price" class="form-control" value="<?php echo $product_price; ?>">
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <aside class="col-lg-4">
                        <div class="mb-3 d-flex gap-2">
                            <input type="submit" name="draft" class="btn btn-warning w-50" value="Draft">
                            <input type="submit" name="update" class="btn btn-primary w-50" value="Update">
                        </div>

                        <div class="mb-3">
                            <label for="product-category" class="form-label">Product Category</label>
                            <select name="product_category_id" class="form-select">
                                <option value="<?php echo $product_category_id; ?>"><?php echo show_product_category_title($product_category_id); ?></option>
                                <?php show_categories_add_product_page(); ?>
                                </select>
                        </div>

                         <div class="mb-3">
                            <label for="product-brand" class="form-label">Product Quantity</label>
                            <input type="number" class="form-control" name="product_quantity" value="<?php echo$product_quantity; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="product-image" class="form-label">Product Image</label>
                            <input type="file" name="file" id="product-image" class="form-control">
                            <img src="../../resources/<?php echo $product_image; ?>" alt="product image" width="250px">
                        </div>
                    </aside>

                </form>

            </div>

   