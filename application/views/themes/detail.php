<section class="shop single section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="product-gallery">

                            <div class="flexslider-thumbnails">
                                <img src="<?= base_url('uploads/' . $detail_product['product_image']); ?>" alt="#">
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="product-des">

                            <div class="short">
                                <h4><?= htmlspecialchars_decode($detail_product['product_title']); ?></h4>

                                <p class="price"><span class="discount"><?= 'Rp ' . number_format($detail_product['product_price'], 0, ',', '.'); ?></span> </p>
                                <p class="description"><?= htmlspecialchars_decode($detail_product['product_description']); ?></p>
                            </div>
                            <div class="price">
                                <p>Price : <span>Rs.<?= $this->cart->format_number($detail_product['product_price']) ?></span></p>
                                <p>Category : <span><?= $detail_product['category_name'] ?></span></p>
                                <p>Brand : <span><?= $detail_product['brand_name'] ?></span></p>
                                <p>STOK : <span><?= $detail_product['product_quantity'] ?></span></p>
                            </div>
                            <div class="product-buy">
                                <form action="<?= base_url('shoping_cart'); ?>" method="post">
                                    <div class="quantity">
                                        <h6>Quantity :</h6>
                                    </div>
                                    <input type="number" class="buyfield" name="qty" value="1" />
                                    <input type="hidden" name="product_id" value="<?= isset($detail_product['product_id']) ? $detail_product['product_id'] : ''; ?>">
                                    <div class="add-to-cart">
                                        <?php
                                        $customer_id = $this->session->userdata('customer_id');
                                        if ($customer_id) {
                                        ?>
                                            <input type="submit" class="btn btn-primary" name="submit" value="Buy Now" />
                                        <?php } else { ?>
                                            <a href="<?= base_url('/customer/login'); ?>" class="btn btn-primary">Login to Buy</a>
                                        <?php } ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>