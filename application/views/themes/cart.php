<div class="shopping-cart section">
    <?php if (empty($cart_contents)) : ?>
        <div style="display: flex; justify-content: center;">
            <div class="single-widget get-button mx-auto">
                <div class="content">
                    <div class="button">
                        <a href="<?php echo base_url('/') ?>" class="btn">Continue shopping</a>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>PRODUCT</th>
                                <th>NAME</th>
                                <th class="text-center">UNIT PRICE</th>
                                <th class="text-center">QUANTITY</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($cart_contents as $cart_items) {
                                $i++;
                            ?>
                                <tr>
                                    <td class="image" data-title="Product Image">
                                        <?php if (isset($cart_items['options']['image'])) : ?>
                                            <img src="<?= base_url('uploads/' . $cart_items['options']['image']) ?>" alt="Product Image" />
                                        <?php else : ?>
                                            <p>Product Image not available</p>
                                        <?php endif; ?>
                                    </td>
                                    <td class="title" data-title="title">
                                        <p><?= $cart_items['name']; ?></p>
                                    </td>
                                    <td class="price" data-title="Price"><span>Rp. <?= $this->cart->format_number($cart_items['price']) ?></span></td>
                                    <td class="qty" data-title="Qty">
                                        <form action="<?php echo base_url('cart/update_cart'); ?>" method="post">
                                            <input type="number" name="qty" value="<?php echo $cart_items['qty'] ?>" />
                                            <input type="hidden" name="rowid" value="<?php echo $cart_items['rowid'] ?>" />
                                            <input class="btn-warning" type="submit" name="submit" value="Update" />
                                        </form>
                                    </td>

                                    <td class="total-amount" data-title="Total"><span>Rp. <?= $this->cart->format_number($cart_items['subtotal']) ?></span></td>
                                    <td class="action" data-title="Remove">
                                        <form action="<?php echo base_url('cart/remove_cart'); ?>" method="post">
                                            <input type="hidden" name="rowid" value="<?php echo $cart_items['rowid'] ?>" />
                                            <button type="submit" name="submit" class="btn-warning"><i class="ti-trash remove-icon"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="shop checkout section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="checkout-form">
                                <h2>Checkout</h2>
                                <p>Masukkan Data & Alamat Pengiriman</p>
                                <div id="result">
                                    <span class="badge text-bg-danger"><?php echo $this->session->flashdata('message'); ?></span>
                                </div>
                                <form class="form" id="shipping-form" action="<?php echo base_url('Customer/save_checkout_address') ?>" method="post">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="checkout_name">Name<span>*</span></label>
                                                <input type="text" id="checkout_name" name="checkout_name" placeholder="Enter your name" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="checkout_email">Email Address<span>*</span></label>
                                                <input type="email" id="checkout_email" name="checkout_email" placeholder="Enter your email address" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="checkout_phone">Phone Number<span>*</span></label>
                                                <input type="number" id="checkout_phone" name="checkout_phone" placeholder="Enter your phone number" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="checkout_provinsi">Provinsi<span>*</span></label><br>
                                                <select class="custom-select" id="checkout_provinsi" name="checkout_provinsi" required></select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="checkout_kota">City<span>*</span></label><br>
                                                <select class="custom-select" id="checkout_kota" name="checkout_kota" required>
                                                    <option value="">Select City</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="checkout_alamat">Alamat Lengkap<span>*</span></label>
                                                <input type="text" id="checkout_alamat" name="checkout_alamat" placeholder="Enter your address" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kodepos">Kode Pos<span>*</span></label>
                                                <input type="number" id="kodepos" name="kodepos" placeholder="Enter your Kode Pos" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="select-expedisi">Expedisi<span>*</span></label><br>
                                                <select class="custom-select" id="select-expedisi" name="expedisi" required>
                                                    <option value="">Expedisi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="select_service">Service<span>*</span></label><br>
                                                <select class="custom-select" id="select_service" name="ongkir" required>
                                                    <option value="">Service</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn">Checkout</button>
                                            </div>
                                        </div>
                                        <input type="hidden" id="total_belanja" name="total_belanja">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="order-details">
                                <div class="single-widget">
                                    <h2>CART TOTALS</h2>
                                    <div class="content">
                                        <ul>
                                            <li>Total Harga Produk<span>Rp. <?php echo $this->cart->format_number($this->cart->total()) ?></span></li>
                                            <?php if (!empty($shippingCost)) : ?>
                                                <li id="shipping-cost">Total Ongkos Kirim<span>Rp. <?php echo $this->cart->format_number($shippingCost) ?></span></li>
                                                <li class="last">Total Belanja<span>Rp. <?php echo $this->cart->format_number($this->cart->total() + $shippingCost) ?></span></li>
                                            <?php else : ?>
                                                <li id="shipping-cost">Total Ongkos Kirim<span>Belum tersedia</span></li>
                                                <li class="last">Total Belanja<span>Rp. <?php echo $this->cart->format_number($this->cart->total()) ?></span></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                                $customer_id = $this->session->userdata('customer_id');
                                if (empty($customer_id)) {
                                ?>
                                    <div class="single-widget get-button">
                                        <div class="content">
                                            <div class="button">
                                                <a href="<?php echo base_url('checkout') ?>" class="btn">Continue shopping</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } elseif (!empty($customer_id)) {
                                ?>
                                    <div class="single-widget get-button">
                                        <div class="content">
                                            <div class="button">
                                                <a href="<?php echo base_url('/') ?>" class="btn">Continue shopping</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php endif; ?>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        $.ajax({
            url: "<?php echo base_url('Rajaongkir/provinsi'); ?>",
            type: 'POST',
            success: function(response) {
                $("#checkout_provinsi").html(response);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });

        $("#checkout_provinsi").on("change", function() {
            var selectedProvinsi = $("option:selected", this).attr("id_provinsi");

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Rajaongkir/kota'); ?>",
                data: 'id_provinsi=' + selectedProvinsi,
                success: function(response) {
                    $("#checkout_kota").html(response);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });

        $("#checkout_kota").on("change", function() {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Rajaongkir/expedisi'); ?>",
                success: function(response) {
                    $("#select-expedisi").html(response);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });

        $("#select-expedisi").on('change', function() {
            var origin = "501"; // Kode kota Yogyakarta (asal default)
            var destination = $("#checkout_kota").val(); // Kode kota tujuan
            var weight = "1700"; // Berat kiriman dalam gram (default 1700)
            var courier = $("#select-expedisi").val(); // Kurir yang digunakan

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Rajaongkir/cost'); ?>",
                data: {
                    origin: origin,
                    destination: destination,
                    weight: weight,
                    courier: courier
                },
                success: function(response) {
                    var selectOptions = '<option selected value="" disabled selected>-Service-</option>';
                    var data = JSON.parse(response);

                    if (data.rajaongkir && data.rajaongkir.results) {
                        data.rajaongkir.results.map((value) => {
                            if (value.costs) {
                                value.costs.map((value2, index) => {
                                    var shippingCostFormatted = new Intl.NumberFormat('id-ID', {
                                        style: 'currency',
                                        currency: 'IDR'
                                    }).format(value2.cost[0]["value"]);
                                    selectOptions += `<option value="${index + 1}">${value2.service} - ${shippingCostFormatted} (${value2.cost[0]["etd"]} hari)</option>`;
                                });
                            }
                        });
                    }

                    $("#select_service").html(selectOptions);
                    $("#select_service").on("change", function() {
                        var selectedOption = $(this).val();

                        if (selectedOption) {
                            var shippingCost = data.rajaongkir.results[0].costs[selectedOption - 1].cost[0].value;

                            if (!isNaN(shippingCost)) {
                                var shippingCostFormatted = new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR'
                                }).format(shippingCost);

                                $("#shipping-cost span").html(shippingCostFormatted);

                                var totalHargaProduk = parseFloat("<?php echo str_replace(',', '', $this->cart->format_number($this->cart->total())); ?>");
                                var totalBelanja = totalHargaProduk + parseFloat(shippingCost);
                                var totalBelanjaFormatted = new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR'
                                }).format(totalBelanja);

                                $(".last span").html(totalBelanjaFormatted);

                                // Simpan total belanja ke dalam input tersembunyi
                                $("#total_belanja").val(totalBelanja);
                            } else {
                                $("#shipping-cost span").html("Belum tersedia");

                                var totalHargaProduk = parseFloat("<?php echo str_replace(',', '', $this->cart->format_number($this->cart->total())); ?>");
                                var totalHargaProdukFormatted = new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR'
                                }).format(totalHargaProduk);

                                $(".last span").html(totalHargaProdukFormatted);

                                // Simpan total belanja ke dalam input tersembunyi
                                $("#total_belanja").val(totalHargaProduk);
                            }
                        } else {
                            $("#shipping-cost span").html("");
                            $(".last span").html("");

                            // Reset nilai total belanja pada input tersembunyi
                            $("#total_belanja").val("");
                        }
                    });

                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });

        // ...

    });
</script>