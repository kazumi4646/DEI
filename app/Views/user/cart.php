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
        <div class="portfolio-details py-0" id="portfolio-details">
          <div class="col-12">
            <div class="portfolio-info">
              <div class="empty-message d-flex justify-content-center">
                <p class="fs-5 fw-bold">Your cart is currently empty!</p>
              </div>
              <div class="shop-btn d-flex justify-content-center">
                <a href="<?= base_url('/shop'); ?>" class="btn get-started-btn" style="margin-left: 0 !important;">Start Shopping</a>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <?php if (count($page['cart']) > 0) : ?>
        <form action="<?= base_url('/cart'); ?>" method="post" id="add-form">
          <input type="hidden" name="product_id" id="add-product-id">
        </form>

        <form action="<?= base_url('/cart/min'); ?>" method="post" id="min-form">
          <input type="hidden" name="product_id" id="min-product-id">
        </form>

        <form action="<?= base_url(); ?>/cart/" method="post" id="del-form">
          <input type="hidden" name="_method" value="DELETE">
        </form>

        <div class="d-none d-md-block">
          <div id="items">
            <?php foreach ($page['cart'] as $product) : ?>
              <div class="row align-items-center fs-6 mt-3">
                <div class="col-3 col-md-2 offset-md-1 ">
                  <img src="<?= base_url('/uploads/products/' . $product['image']); ?>" alt="<?= $product['name']; ?>" style="max-width: 100%;">
                </div>
                <div class="col-3 col-md-3">
                  <?= $product['name']; ?>
                </div>
                <div class="col-2 col-md-2">
                  <button type="submit" form="min-form" id="btn-min" class="btn btn-sm" <?= ($product['items'] == 1) ? 'disabled' : ''; ?> data-id="<?= $product['id']; ?>"><i class="fas fa-minus"></i></button>
                  <span class="px-2">x <?= $product['items']; ?></span>
                  <button type="submit" form="add-form" id="btn-add" class="btn btn-sm" data-id="<?= $product['id']; ?>"><i class="fas fa-plus"></i></button>
                </div>
                <div class="col-4 col-md-3">
                  Rp. <?= number_format($product['price'] * $product['items'], 0, ',', '.'); ?>
                  <button type="submit" form="del-form" id="btn-del" class="btn" style="color: #e03a3c;" data-id="<?= $product['id']; ?>"><i class="fas fa-trash-alt"></i></button>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <hr>
          <div class="row">
            <div class="col-5 offset-3 col-md-2 offset-md-6">
              <b>Total Price</b>
            </div>
            <div class="col-4 col-md-2 offset-md-0">
              <b>Rp. <?= number_format($page['total'][0]['total'], 0, ',', '.'); ?></b>
            </div>
          </div>
          <div class="row">
            <div class="col-3 offset-8 col-md-2 offset-md-8">
              <button type="button" class="btn get-started-btn" style="margin: 20px 0 !important;" data-bs-toggle="modal" data-bs-target="#checkoutModal">
                Checkout
              </button>
            </div>
          </div>
        </div>

        <div class="d-block d-md-none">
          <div class="row portfolio-details py-0" id="portfolio-details">
            <div class="col-12">
              <div class="portfolio-info">
                <?php foreach ($page['cart'] as $product) : ?>
                  <div class="row mb-3">
                    <div class="col-5">
                      <img src="<?= base_url('/uploads/products/' . $product['image']); ?>" alt="<?= $product['name']; ?>" class="w-100">
                    </div>
                    <div class="col-7">
                      <p class="mb-2 fs-6 fw-bold"><?= $product['name']; ?></p>
                      <div class="cart-btn">
                        <button type="submit" form="min-form" id="btn-min" class="btn btn-sm" <?= ($product['items'] == 1) ? 'disabled' : ''; ?> data-id="<?= $product['id']; ?>"><i class="fas fa-minus"></i></button>
                        <span class="px-1">x <?= $product['items']; ?></span>
                        <button type="submit" form="add-form" id="btn-add" class="btn btn-sm" data-id="<?= $product['id']; ?>"><i class="fas fa-plus"></i></button>
                        <button type="submit" form="del-form" id="btn-del" class="btn" style="color: #e03a3c;" data-id="<?= $product['id']; ?>"><i class="fas fa-trash-alt"></i></button>
                      </div>
                      <span>
                        <?= 'Rp. ' . number_format($product['price'] * $product['items'], 0, ',', '.'); ?>
                      </span>
                    </div>
                  </div>
                <?php endforeach; ?>

                <div class="row">
                  <div class="col-7 offset-5">
                    <hr>
                  </div>
                </div>

                <div class="row fw-bold">
                  <div class="col-5">
                    <p>Total Price</p>
                  </div>
                  <div class="col-7">
                    <span>
                      <?= 'Rp. ' . number_format($page['total'][0]['total'], 0, ',', '.'); ?>
                    </span>
                  </div>
                </div>

                <div class="row">
                  <button type="button" class="btn get-started-btn" data-bs-toggle="modal" data-bs-target="#checkoutModal">
                    Checkout
                  </button>
                </div>
              </div>
            </div>
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
            <input type="hidden" name="product_id" value="<?= implode(',', array_column($page['id'], 'name')); ?>">
            <input type="hidden" name="items" value="<?= implode(',', array_column($page['id'], 'items')); ?>">
            <input type="hidden" name="items_image" value="<?= implode(',', array_column($page['cart'], 'image')); ?>">
            <input type="hidden" name="items_price" value="<?= implode(',', array_column($page['cart'], 'price')); ?>">
            <input type="hidden" name="total_items" value="<?= $page['items'][0]['items']; ?>">
            <input type="hidden" name="total_price" value="<?= $page['total'][0]['total']; ?>">

            <p class="mb-2">Your order(s)</p>
            <?php foreach ($page['cart'] as $product) : ?>
              <div class="row">
                <div class="col-5">
                  <p><?= $product['name']; ?></p>
                </div>
                <div class="col-2">
                  <p>x <?= $product['items']; ?></p>
                </div>
                <div class="col-5">
                  <p>Rp. <?= number_format($product['price'] * $product['items'], 0, ',', '.'); ?></p>
                </div>
              </div>
            <?php endforeach; ?>
            <div class="row">
              <div class="col-5">
                <b>Total</b>
              </div>
              <div class="col-2">
                <b>x <?= $page['items'][0]['items']; ?></b>
              </div>
              <div class="col-5">
                <b>Rp. <?= number_format($page['total'][0]['total'], 0, ',', '.'); ?></b>
              </div>
            </div>

            <hr>
            <div class="alert alert-warning" role="alert">
              You can edit your profile by visiting <a href="<?= base_url('/profile'); ?>" class="text-primary text-decoration-underline">this page</a>.
            </div>

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
                <input type="text" value="<?= user()->email; ?>" class="form-control mb-1" disabled>
                <input type="text" value="<?= user()->telp; ?>" class="form-control" disabled>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-3">
                Shipping Address
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

<script>
  $(document).on('click', '#btn-add', function() {
    let id = $(this).data('id');
    let formAction = $('#add-form').attr('action');

    $('#add-product-id').val(id);
  });

  $(document).on('click', '#btn-min', function() {
    let id = $(this).data('id');
    let formAction = $('#min-form').attr('action');

    $('#min-product-id').val(id);
  });

  $(document).on('click', '#btn-del', function() {
    let id = $(this).data('id');
    let formAction = $('#del-form').attr('action');

    $('#del-form').attr('action', formAction + id);
  });
</script>

<?= $this->endSection(); ?>