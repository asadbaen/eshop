<!-- Product Style -->
<section class="product-area shop-sidebar shop section">
    <!-- Single Widget Search -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <div class="d-flex justify-content-center py-3">
                    <div class="col-lg-6 col-md-4 col-12">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search-input">
                            <button class="btn btn-outline-success" type="button" onclick="searchProducts()">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--/ End Single Widget Search -->

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="shop-sidebar">
                    <!-- Single Widget -->
                    <div class="single-widget category">
                        <a href=".">
                            <h3 class="title" id="category-title"> Categories
                            </h3>
                        </a>
                        <ul class="categor-list">
                            <?php
                            foreach ($categories as $category) {
                                $categoryName = strtoupper($category['category_name']);
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab" href="#<?php echo $categoryName; ?>" role="tab" data-category="<?php echo $category['id']; ?>">
                                        <?php echo $category['category_name']; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!--/ End Single Widget -->
                    <!-- Single Widget -->
                    <div class="single-widget recent-post">
                        <h3 class="title">Recent post</h3>
                        <!-- Single Post -->
                        <?php

                        $productRecentPost = array_slice($all_product, 0, 3); // Ubah ini menjadi recent post yang diinginkan
                        foreach ($productRecentPost as $recentPost) { ?>
                            <div class="single-post first">
                                <div class="image">
                                    <img src="<?= base_url('uploads/' . $recentPost['product_image']); ?>" alt="#">
                                </div>
                                <div class="content">
                                    <h5><a href="<?= base_url(); ?>welcome/detail/<?= $recentPost['product_id']; ?>"><?= $recentPost['product_title']; ?></a></h5>
                                    <p class="price"><?= 'Rp' . number_format($recentPost['product_price'], 0, ',', '.'); ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!--/ End Shop Sidebar -->
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <div class="row" id="product-container">
                    <?php foreach ($categories as $category) :
                        $selectedCategory = strtoupper($category['category_name']);
                        $categoryProducts = array_filter($all_product, function ($product) use ($category) {
                            return $product['product_category'] == $category['id'];
                        });
                        $categoryProductsLimited = array_slice($categoryProducts, 0, 8); // Mengambil 8 produk pertama

                        if ($category['category_name'] == $selectedCategory) : ?>
                            <div class="col-12">
                                <h2><?= $category['category_name']; ?></h2>
                            </div>
                            <?php foreach ($categoryProductsLimited as $product) : ?>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="<?= base_url(); ?>welcome/detail/<?= $product['product_id']; ?>">
                                                <img class="default-img" src="<?= base_url('uploads/' . $product['product_image']); ?>" alt="#">
                                                <img class="hover-img" src="<?= base_url('uploads/' . $product['product_image']); ?>" alt="#">
                                            </a>
                                            <div class="button-head">
                                                <div class="product-action">
                                                    <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="<?= base_url(); ?>welcome/detail/<?= $product['product_id']; ?>"><i class="ti-eye"></i><span>Checkout</span></a>

                                                </div>
                                                <div class="product-action-2">
                                                    <a title="Add to cart" href="<?= base_url(); ?>welcome/detail/<?= $product['product_id']; ?>">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content mb-3">
                                            <h3><a href="<?= base_url(); ?>welcome/detail/<?= $product['product_id']; ?>"><?= $product['product_title']; ?></a></h3>
                                            <div class="product-price">
                                                <span><?= 'Rp' . number_format($product['product_price'], 0, ',', '.'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                    <?php endif;
                    endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil semua elemen dengan kelas 'nav-link'
        var categoryLinks = document.querySelectorAll('.nav-link');

        // Ambil elemen judul kategori
        var categoryTitle = document.getElementById('category-title');

        // Tambahkan event listener untuk setiap elemen
        categoryLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                // Hapus kelas 'active' dari semua elemen 'nav-link'
                categoryLinks.forEach(function(item) {
                    item.classList.remove('active');
                });

                // Tambahkan kelas 'active' pada elemen yang di-klik
                link.classList.add('active');

                var categoryId = link.getAttribute('data-category');

                // Jika judul kategori diklik, tampilkan semua produk
                if (link === categoryTitle) {
                    categoryId = null;
                }

                var productContainer = document.getElementById('product-container');
                productContainer.innerHTML = '';

                var categoryProducts = <?php echo json_encode($all_product); ?>.filter(function(product) {
                    return !categoryId || product['product_category'] == categoryId;
                });

                var selectedCategory = link.innerHTML.toUpperCase(); // Tambahkan ini untuk menampilkan selectedCategory

                if (selectedCategory === "CATEGORIES") {
                    selectedCategory = "";
                }

                productContainer.innerHTML += `
                <div class="col-12">
                    <h2>${selectedCategory}</h2>
                </div>
            `;

                categoryProducts.forEach(function(product) {
                    var productHTML = `
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="<?= base_url(); ?>welcome/detail/${product['product_id']}">
                                    <img class="default-img" src="<?= base_url('uploads/') ?>${product['product_image']}" alt="#">
                                    <img class="hover-img" src="<?= base_url('uploads/') ?>${product['product_image']}" alt="#">
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="<?= base_url(); ?>welcome/detail/${product['product_id']}" ><i class="ti-eye"></i><span>Quick Shop</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a title="Add to cart" href="<?= base_url(); ?>welcome/detail/${product['product_id']}">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="<?= base_url(); ?>welcome/detail/${product['product_id']}">${product['product_title']}</a></h3>
                                <div class="product-price">
                                    <span>Rp ${product['product_price']}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                    productContainer.innerHTML += productHTML;
                });
            });
        });
    });
</script>
<script type="text/javascript">
    function searchProducts() {
        const keyword = document.querySelector('#search-input').value.toLowerCase(); // Ambil kata kunci dari input pencarian
        const products = document.querySelectorAll('#product-container .single-product'); // Ambil semua produk

        products.forEach(product => {
            const title = product.querySelector('h3 a').textContent.toLowerCase(); // Ambil judul produk

            if (title.includes(keyword)) {
                product.style.display = 'block'; // Tampilkan produk jika judulnya cocok dengan kata kunci
            } else {
                product.style.display = 'none'; // Sembunyikan produk jika judulnya tidak cocok
            }
        });
    }
</script>



<!--/ End Product Style 1  -->