<?= $this->include('/User/top') ?>

<style>
img {
    width: 400px;
    height: 400px;
}
</style>
<!-- Store Start -->
<div class="container-xxl py-5" style="max-width: 100%;">
    <div class="container">
        <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 100%;">
            <p class="fs-5 fw-medium fst-italic text-primary">Online Store</p>
            <!-- <h1 class="display-6">T-Shirts</h1> -->


        </div>
        <?php foreach ($product as $products): ?>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="store-item position-relative text-center">
                    <img class="img-fluid" style="width: 350px; height: 400px;" src="<?= base_url($products['productImage']) ?>" alt="">
                    <div class="p-4">

                        <h4 class="mb-3"><?= $products['productName'] ?></h4>
                        <p><?= $products['productDescription'] ?></p>
                        <h4 class="text-primary"><?= '₱' . $products['productPrice'] ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <div>
            <br><br>
        </div>


    </div>
</div>
<?= $this->include('/User/end') ?>