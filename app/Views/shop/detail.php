<?= $this->extend('template/base'); ?>
<?= $this->section('content'); ?>

<?= view('template/_partials/base_nav'); ?>

<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <div class="row">
        <ol>
          <li><a href="/shop">Shop</a></li>
          <li>Detail</li>
        </ol>
        <h2>Product Detail</h2>
    </div>
  </section><!-- End Breadcrumbs -->

  <section class="shop" id="shop">
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-md-1">
          <div class="row">
          <div class="col-md-4">
            <img src="<?= base_url('assets/img/shop/vanilla/product-1.jpg'); ?>" alt="" class="img-thumbnail">
          </div>
          <div class="col-md-8">
            <h3>Vanilla Grade A++ Pro Max</h3>
            <hr>
            <p class="fs-2">Rp. 1.000.000/kg</p>
            <div class="row mt-4">
                <div class="col-3">
                    Availability:
                </div>
                <div class="col-auto">
                  <span class="badge bg-primary">In Stock</span>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-3">
                    Quantity:
                </div>
                <div class="col-auto">
                  <div class="input-group">
                    <span class="minus text-light"><i class="bi bi-dash"></i></span>
                      <input type="number" class="qty-btn" value="1"/>
                    <span class="plus text-light" ><i class="bi bi-plus"></i></span>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-3">
                  Total:
                </div>
                <div class="col-auto">
                  Rp. 100.000.000
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-3">
                  <a href="" class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#formConfirmation">Order</a>
                </div>
              </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->

<!-- Modal -->
<div class="modal fade" id="formConfirmation" tabindex="-1" aria-labelledby="formConfirmationLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formConfirmationLabel">Form Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form>
        <div class="modal-body">
          <div class="mb-3">
            <label for="emailField" class="form-label">Email address</label>
            <input type="email" class="form-control" id="emailField" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="nameField" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="nameField">
          </div>
          <div class="mb-3">
            <label for="phoneField" class="form-label">Phone Number</label>
            <input type="number" class="form-control" id="phoneField">
          </div>
          <div class="mb-3">
            <label for="addressField" class="form-label">Address</label>
            <textarea name="addressField" id="addressField" rows="5" class="form-control"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#orderConfirmation">Order Now</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="orderConfirmation" tabindex="-1" aria-labelledby="orderConfirmationLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="orderConfirmationLabel">Order Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-4">Product Name </div>
          <div class="col-auto">: Vanilla Grade A++ Pro Max</div>
        </div>
        <div class="row mt-2">
          <div class="col-4">Product Price </div>
          <div class="col-auto">: Rp. 1.000.000/kg</div>
        </div>
        <div class="row mt-2">
          <div class="col-4">Product Quantity </div>
          <div class="col-auto">: 5</div>
        </div>
        <div class="row mt-2">
          <div class="col-4">Total Price</div>
          <div class="col-auto">: Rp. 5.000.000</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Confirm Order</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
