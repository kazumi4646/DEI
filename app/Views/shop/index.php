<?= $this->extend('template/base'); ?>
<?= $this->section('content'); ?>

<?= view('template/_partials/base_nav'); ?>

<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <ol>
            <li><a href="/">Home</a></li>
            <li>Shop</li>
          </ol>
          <h2>Shop</h2>
        </div>
        <div class="col-md-3 mt-3 offset-3">
          <form action="/search" method="POST">
            <div class="input-group mb-3 col-md-3">
              <input type="text" class="form-control" name="keyword" placeholder="Enter Keyword" aria-describedby="search">
              <button class="btn btn-outline-secondary" type="button" id="search">Search</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section><!-- End Breadcrumbs -->

  <section class="shop" id="shop">
    <div class="container">
      <div class="row row-cols-2 row-cols-md-6 g-4">
        <div class="col">
          <a href="/shop/product">
            <div class="card h-100 text-dark">
              <img src="assets/img/shop/vanilla/product-1.jpg" class="card-img-top" alt="assets/img/shop/vanilla/product-1.jpg">
              <div class="card-body">
                <h5 class="card-title">Vanilla Grade A++ Pro Max</h5>
                <p class="card-text" style="white-space: nowrap; overflow:hidden;">Rp. 1.000.000/1kg</p>
              </div>
            </div>
          </a>
        </div>

      </div>
    </div>
  </section>
</main><!-- End #main -->

<?= $this->endSection(); ?>