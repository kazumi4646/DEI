<?= $this->extend('templates/base_home'); ?>
<?= $this->section('content'); ?>

<style>
  .products {
    flex-direction: column;
  }

  .product {
    /*width: 200px;*/
    box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    overflow: hidden;
    /*margin: 25px;*/
  }

  .slide-img {
    position: relative;
  }

  .slide-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    box-sizing: border-box;
  }

  .detail-product {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    box-sizing: border-box;
    font-family: calibri;
  }

  .detail {
    display: flex;
    flex-direction: column;
    white-space: nowrap;
    overflow: hidden;
  }

  .detail a {
    color: #222222;
    margin: 5px 0px;
    font-weight: 700;
    letter-spacing: 0.5px;
    padding-right: 8px;
    text-overflow: ellipsis;
  }

  .detail span {
    color: rgb(26, 26, 26);
  }

  .price {
    color: #333333;
    font-weight: 600;
    font-size: 1.1rem;
    font-family: poppins;
    letter-spacing: 0.5px;
  }

  .overlay {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    /*background-color: rgba(92, 95, 236, 0.6);*/
    background-color: rgba(17, 17, 17, 0.6);
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .buy-btn {
    width: 160px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #ffffff;
    color: #252525;
    font-weight: 700;
    letter-spacing: 1px;
    font-family: calibri;
    border-radius: 20px;
    box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.2);
  }

  .buy-btn:hover {
    color: #ffffff;
    background-color: #e03a3c;
    transition: all ease 0.3s;
  }

  .overlay {
    visibility: hidden;
  }

  .slide-img:hover .overlay {
    visibility: visible;
    animation: fade 0.5s;
  }

  .btn-cart {
    background-color: #e03a3c;
    color: #fff;
    width: 100%;
  }

  .btn-cart:hover {
    background-color: #111;
    color: #fff;
    transition: all ease 0.3s;
  }

  @keyframes fade {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }
</style>

<?php if (in_groups('user')) {
  echo $this->include('templates/_partials/user_nav');
} else {
  echo $this->include('templates/_partials/shop_nav');
} ?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-5 col-md-5 col-sm-5">
          <ol>
            <li><a href="<?= base_url('/'); ?>">Home</a></li>
            <li><?= $page['section']; ?></li>
          </ol>
          <h2><?= $page['section']; ?></h2>
        </div>
        <div class="col-lg-4 offset-lg-2 col-md-4 offset-md-2 col-sm-5 offset-sm-1 text-end search-form">
          <form action="<?= base_url(); ?>" method="POST">
            <input type="text">
            <button type="submit"><i class="bi bi-search"></i></button>
          </form>
        </div>
      </div>
    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container" data-aos="fade-up">
      <div class="row row-cols-2 row-cols-md-5">
        <?php foreach ($page['products'] as $product) : ?>
          <div class="col mb-4">
            <div class="product">
              <div class="slide-img">
                <img src="<?= base_url('/uploads/products/' . $product['image']); ?>" alt="1" />
                <div class="overlay">
                  <a href="<?= base_url($product['id'] . '/detail'); ?>" class="buy-btn">See Detail</a>
                </div>
              </div>
              <div class="detail-product">
                <div class="detail">
                  <a href="<?= base_url($product['id'] . '/detail'); ?>" class="price"><?= $product['name']; ?></a>
                  <span>Rp. <?= number_format($product['price'], 0, ',', '.'); ?><span style="font-size: .9rem;">/<?= $product['unit_price']; ?></span></span>
                </div>
              </div>
              <div class="button m-2">
                <div class="row">
                  <?php if ($product['status'] == 'In Stock') : ?>
                    <form action="<?= base_url('/cart'); ?>" method="post">
                      <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                      <button type="submit" class="btn btn-cart">Add to Cart</button>
                    </form>
                  <?php endif; ?>

                  <?php if ($product['status'] == 'Pre Order') : ?>
                    <form action="<?= base_url('/bid'); ?>" method="post">
                      <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                      <button type="submit" class="btn btn-cart">Place Bid</button>
                    </form>
                  <?php endif; ?>

                  <?php if ($product['status'] == 'Sold Out') : ?>
                    <button class="btn btn-cart" disabled>Add to Cart</button>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>