<?= $this->extend('template/base_admin'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Products</li>
        </ol>
      </nav>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewProduct">
        Add Product
      </button>
    </div><!-- End Page Title -->

    <section class="section products mt-4">
      <div class="row">
        <div class="col-12">
            <table id="products" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Status</th>
                        <th>Product Category</th>
                        <th>Product Description</th>
                        <th>Product By</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['products'] as $product => $row): ?>
                        <tr>
                            <td><?= $product + 1; ?></td>
                            <td><?= $row['product_image']; ?></td>
                            <td><?= $row['product_name']; ?></td>
                            <td><?= $row['product_price']; ?></td>
                            <td><?= $row['product_status']; ?></td>
                            <td><?= $row['product_category']; ?></td>
                            <td><?= $row['product_description']; ?></td>
                            <td><?= $row['product_by']; ?></td>
                            <td>
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditProduct">
                                <i class="bi bi-pencil"></i>
                              </button>
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#DeleteProduct">
                                <i class="bi bi-trash"></i>
                              </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </body>
            </table>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- Modal -->
  <div class="modal fade" id="addNewProduct" tabindex="-1" aria-labelledby="addNewProductLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addNewProductLabel">Add New Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/products" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="mb-3">
              <label for="nameField" class="form-label">Product Name</label>
              <input type="text" class="form-control" name="nameField" id="nameField" value="<?php echo old('nameField'); ?>">
            </div>
            <div class="mb-3">
              <label for="descriptionField" class="form-label">Product Description</label>
              <textarea class="form-control" name="descriptionField" id="descriptionField" rows="5" cols="10"><?php echo old('descriptionField'); ?></textarea>
            </div>
            <div class="mb-3">
              <label for="priceField" class="form-label">Product Price</label>
              <input type="number" class="form-control" name="priceField" id="priceField" value="<?php echo old('priceField'); ?>">
            </div>
            <div class="mb-3">
              <label for="imageField" class="form-label">Product Image</label>
              <input type="file" class="form-control" name="imageField" id="imageField">
            </div>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="statusField" <?php echo old('statusField') == 'Active' ? 'checked' : '' ?> value="Active">
              <label class="form-check-label" name="statusField" for="statusField">Product in stock</label>
            </div>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="categoryField" <?php echo old('categoryField') == 'Regular' ? 'checked' : '' ?> value="Regular">
              <label class="form-check-label" name="categoryField" for="categoryField">Pre Order Product</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Add Product</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal" id="EditProduct" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Product.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="nameField" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="nameField" value="">
        </div>
        <div class="mb-3">
          <label for="descriptionField" class="form-label">Product Description</label>
          <input type="text" class="form-control" id="descriptionField" value="">
        </div>
        <div class="mb-3">
              <label for="priceField" class="form-label">Product Price</label>
              <input type="number" class="form-control" name="priceField" id="priceField" value="<?php echo old('priceField'); ?>">
            </div>
        <div class="mb-3">
          <label for="imageField" class="form-label">Product Image</label>
          <input type="file" class="form-control" id="imageField">
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" role="switch" id="statusField" value="Active">
          <label class="form-check-label" name="statusField" for="statusField">Product in stock</label>
        </div>>
        <div class="mb-3">
          <label for="imageField" class="form-label">Product Image</label>
          <input type="file" class="form-control" id="imageField">
        </div>
        <div class="mb-3">
          <label for="imageField" class="form-label">Product Image</label>
          <input type="file" class="form-control" id="imageField">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="DeleteProduct" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <h5 class="modal-title">Delete Product</h5>
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>The selected data will be deleted. Are you sure want to delete this data?</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary">Yes</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
    </div>
  </div>
</div>
</div>
<?= $this->endSection(); ?>
