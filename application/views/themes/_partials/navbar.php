<header class="header shop">
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="<?= base_url(); ?>assets/theme_shop/images/logo.png" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button cart="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <?php
                $query = $this->db->get('tbl_category');

                $categories = $query->result_array();
                ?>
                <div class="col-lg-8 col-md-7 col-12">
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <?php
                        $customer_id = $this->session->userdata('customer_id');
                        if ($customer_id) {
                        ?>
                            <div class="sinlge-bar">
                                <a href="<?= site_url('customer/logout'); ?>" class="single-icon">
                                    <i class="fa fa-power-off" aria-hidden="true"></i></a>
                            </div>
                        <?php } else {
                        ?>
                            <div class="sinlge-bar">
                                <a href="<?= site_url('customer/login'); ?>" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="sinlge-bar shopping">
                            <?php
                            $cart_contents = $this->cart->contents();
                            if (empty($cart_contents)) {
                                $cart_contents = array();
                            }
                            ?>
                            <!-- Shopping Item -->
                            <?php
                            $cart_contents = $this->cart->contents();
                            $total_items = count($cart_contents);
                            ?>

                            <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?php echo $total_items; ?></span></a>
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span><?php echo $total_items; ?> Items</span>
                                    <a href="<?php echo base_url('Cart'); ?>">VIEW CART</a>
                                </div>

                                <?php if ($total_items > 0) : ?>
                                    <ul class="shopping-list">
                                        <?php foreach ($cart_contents as $cart) : ?>
                                            <li>
                                                <a class="cart-img" href="<?php echo base_url('Cart'); ?>">
                                                    <?php if (isset($cart['options']['image'])) : ?>
                                                        <img src="<?php echo base_url('uploads/' . $cart['options']['image']); ?>" alt="Product Image" />
                                                    <?php else : ?>
                                                        <p>Product Image not available</p>
                                                    <?php endif; ?>
                                                </a>
                                                <h4><a href="<?php echo base_url('Cart'); ?>"><?php echo $cart['name']; ?></a></h4>
                                                <p class="quantity"><?php echo $cart['qty']; ?> x <span class="amount"><?php echo $this->cart->format_number($cart['price']); ?></span></p>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>

                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount"><?php echo $this->cart->format_number($this->cart->total()); ?></span>
                                        </div>
                                        <a href="<?php echo base_url('Cart'); ?>" class="btn animate">Checkout</a>
                                    </div>
                                <?php else : ?>
                                    <p>Keranjang kosong</p>

                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount"><?php echo $this->cart->format_number($this->cart->total()); ?></span>
                                        </div>
                                        <a href="<?php echo base_url('/') ?>" class="btn animate">Yuk Belanja</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-9 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li <?php if (current_url() == base_url('welcome')) echo 'class="active"'; ?>>
                                                <a href="<?= base_url(); ?>welcome">Home</a>
                                            </li>
                                            <li <?php if (current_url() == base_url('Cart')) echo 'class="active"'; ?>>
                                                <a href="<?= base_url(); ?>Cart">Keranjang</a>
                                            </li>


                                            <li><a href="<?php echo base_url() ?>Welcome/tentang">Tentang</a></li>
                                            <?php
                                            $customer_id = $this->session->userdata('customer_id');
                                            if ($customer_id) {
                                            ?>
                                                <li><a href="<?php echo base_url('/customer/logout'); ?>">logout</a></li>
                                            <?php } else {
                                            ?>
                                                <li><a href="<?php echo base_url('/customer/login'); ?>">login</a></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!--/ End Header -->