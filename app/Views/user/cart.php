<?= $this->extend('templates/base_home'); ?>
<?= $this->section('content'); ?>

<?= $this->include('templates/_partials/user_nav'); ?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="<?= base_url('/shop'); ?>">Shop</a></li>
        <li>My Cart</li>
      </ol>
      <h2>My Cart</h2>
    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container" data-aos="fade-up">
      <?php if (count($page['cart']) == 0) : ?>
        <div class="alert alert-secondary mb-0" role="alert">
          <p>
            <i class="fas fa-shopping-cart fs-4"></i> <span class="fs-6">Your cart is currently empty!</span>
          </p>
          <div class="shop-btn">
            <a href="<?= base_url('/shop'); ?>" class="btn get-started-btn" style="margin-left: 0 !important;">Start Shopping</a>
          </div>
        </div>
      <?php endif; ?>

      <?php if (count($page['cart']) > 0) : ?>
        <div id="items">
          <?php foreach ($page['cart'] as $product) : ?>
            <div class="row align-items-center fs-6 mt-3">
              <div class="col-md-2 offset-md-1">
                <img src="<?= base_url('/uploads/' . $product['image']); ?>" alt="<?= $product['name']; ?>" width="120px">
              </div>
              <div class="col-md-3">
                <?= $product['name']; ?>
              </div>
              <div class="col-md-2">
                <?= $product['items']; ?>
              </div>
              <div class="col-md-3">
                Rp. <?= number_format($product['price'] * $product['items'], 0, ',', '.'); ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-2 offset-md-6">
            <b>Total Price</b>
          </div>
          <div class="col-md-2">
            <b>Rp. <?= number_format($page['total'][0]['total'], 0, ',', '.'); ?></b>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2 offset-md-8">
            <button type="button" class="btn get-started-btn" style="margin: 20px 0 !important;" data-bs-toggle="modal" data-bs-target="#checkoutModal">
              Checkout
            </button>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>

</main><!-- End #main -->

<!-- Modal -->
<?php if (count($page['cart']) > 0) : ?>
  <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutConfirmation" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="checkoutConfirmation">Order Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('/orders'); ?>" method="post">
            <input type="hidden" name="product_id" value="<?= implode(',', array_column($page['id'], 'id')); ?>">
            <input type="hidden" name="items" value="<?= implode(',', array_column($page['id'], 'items')); ?>">
            <input type="hidden" name="total_items" value="<?= $page['items'][0]['items']; ?>">
            <input type="hidden" name="total_price" value="<?= $page['total'][0]['total']; ?>">

            Your order(s)
            <div class="col-5">
              <hr>
            </div>
            <?php foreach ($page['cart'] as $product) : ?>
              <div class="row">
                <div class="col-5">
                  <b><?= $product['name']; ?></b>
                </div>
                <div class="col-2">
                  <b>x<?= $product['items']; ?></b>
                </div>
                <div class="col-5">
                  <b>Rp. <?= number_format($product['price'] * $product['items'], 0, ',', '.'); ?></b>
                </div>
              </div>
            <?php endforeach; ?>
            <div class="col-7 offset-5">
              <hr>
            </div>
            <div class="row">
              <div class="col-5">
                Total
              </div>
              <div class="col-2">
                <b>x<?= $page['items'][0]['items']; ?></b>
              </div>
              <div class="col-5">
                <b>Rp. <?= number_format($page['total'][0]['total'], 0, ',', '.'); ?></b>
              </div>
            </div>

            <hr>

            <div class="row align-items-center">
              <div class="col-3">
                Customer
              </div>
              <div class="col-9">
                <input type="text" value="<?= user()->fullname; ?>" class="form-control" disabled>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-3">
                Contact
              </div>
              <div class="col-9">
                <input type="text" value="<?= user()->telp; ?>" class="form-control" disabled>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-3">
                Address
              </div>
              <div class="col-9">
                <textarea rows="3" class="form-control" disabled><?= user()->address; ?></textarea>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn get-started-btn" style="margin: 20px 0 !important;">Confirm & Pay</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?= $this->endSection(); ?>