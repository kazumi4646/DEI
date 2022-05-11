<?= $this->extend('templates/base_shop'); ?>
<?= $this->section('inner'); ?>

<style>
  .product-image {
    width: 85%;
  }

  @media (max-width: 576px) {
    .product-image {
      width: 100%;
    }
  }
</style>

<div class="row gy-4 portfolio-details" id="portfolio-details" style="padding: 0;">
  <div class="col-lg-4 offset-lg-2 col-md-4 offset-md-2 col-sm-8 offset-sm-2">
    <img src="<?= base_url('/uploads/products/' . $page['product']['image']); ?>" alt="<?= $page['product']['name']; ?>" class="product-image float-md-end">
  </div>

  <div class="col-lg-4 col-md-4 col-sm-10">
    <div class="portfolio-info">
      <h3><?= $page['product']['name']; ?></h3>
      <ul>
        <li><b style="color: #111; font-size: 1.1em;">Rp. <?= number_format($page['product']['price'], 0, ",", "."); ?></b></li>
        <li>
          <?php if ($page['product']['status'] == 'In Stock') : ?>
            <span class="badge bg-primary">In Stock</span>
          <?php endif; ?>

          <?php if ($page['product']['status'] == 'Pre Order') : ?>
            <form action="<?= base_url('/bid'); ?>" method="post">
              <span class="badge bg-warning">Pre Order</span>
            </form>
          <?php endif; ?>

          <?php if ($page['product']['status'] == 'Sold Out') : ?>
            <span class="badge bg-danger">Sold Out</span>
          <?php endif; ?>
        </li>
        <li class="py-2"><?= $page['product']['description']; ?></li>
        <li>
          <?php if ($page['product']['status'] == 'In Stock') : ?>
            <form action="<?= base_url('/cart'); ?>" method="post">
              <input type="hidden" name="product_id" value="<?= $page['product']['id']; ?>">
              <button type="submit" class="btn get-started-btn" style="margin-left: 0 !important;">Add to Cart</button>
            </form>
          <?php endif; ?>

          <?php if ($page['product']['status'] == 'Pre Order') : ?>
            <form action="<?= base_url('/bid'); ?>" method="post">
              <button type="submit" class="btn get-started-btn" style="margin-left: 0 !important;">Place Bid</button>
            </form>
          <?php endif; ?>

          <?php if ($page['product']['status'] == 'Sold Out') : ?>
            <button class="btn get-started-btn" disabled style="margin-left: 0 !important;">Add to Cart</button>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </div>

</div>

<?= $this->endSection(); ?>