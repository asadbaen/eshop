<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>Invoice :
                                    <?php
                                    $karakter = '123456789';
                                    $id_transaction = $order_info->id_transaction;
                                    echo $combined = $karakter . $id_transaction;
                                    ?>
                                    <small class="float-right">Date: <?= date('Y-m-d', strtotime($shipping_info->created_at)) ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="container">
                            <div class="d-flex justify-content-between">
                                <div class="col-sm-4 float-left">
                                    Customer
                                    <address>
                                        <strong><?php echo $customer_info->customer_name; ?></strong><br>
                                        Alamat : <?php echo $customer_info->customer_address; ?><br>
                                        Phone : <?php echo $customer_info->customer_phone; ?><br>
                                        Email : <?php echo $customer_info->customer_email; ?><br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="float-right">
                                    Tujuan Pengiriman
                                    <address>
                                        <?php if ($shipping_info) : ?>
                                            Nama Penerima : <strong><?= $shipping_info->checkout_name; ?></strong><br>
                                            Alamat Penerima : <?= $shipping_info->checkout_alamat; ?><br>
                                            Provinsi : <?= $shipping_info->checkout_provinsi; ?><br>
                                            Kota/Kabupaten : <?= $shipping_info->checkout_kota; ?><br>
                                            Ekspedisi : <?= $shipping_info->expedisi; ?><br>
                                            Ongkir : <?= $shipping_info->ongkir; ?><br>
                                            Telepon : <?= $shipping_info->checkout_phone; ?><br>
                                            Kode Pos : <?= $shipping_info->kodepos; ?><br>
                                        <?php else : ?>
                                            <p>Data pengiriman tidak tersedia.</p>
                                        <?php endif; ?>
                                    </address>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <?php
                                $totalOrder = 0; // Inisialisasi variabel totalOrder
                                ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Product Name</th>
                                            <th>Product Descriptions</th>
                                            <th class="p-image">Product Image</th>
                                            <th>Product Price</th>
                                            <th>Product QYT</th>
                                            <th>Order Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($order_details_info as $key) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $key->product_name; ?></td>
                                                <td><?= htmlspecialchars_decode($key->product_description); ?></td>
                                                <td class="p-image">
                                                    <img class="w-50" src="<?php echo base_url('uploads/' . $key->product_image); ?>" alt="Product Image">
                                                </td>
                                                <td><?= "Rp " . number_format($key->product_price); ?></td>
                                                <td><?= $key->product_sales_quantity; ?></td>
                                                <td><?= "Rp " . number_format($key->product_price * $key->product_sales_quantity); ?></td>
                                            </tr>
                                            <?php
                                            $totalOrder += $key->product_price * $key->product_sales_quantity; // Menambahkan order total saat ini ke totalOrder
                                            $i++;
                                            ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                                <!-- // Menampilkan jumlah order total
                                <div>Jumlah Order Total: <?= "Rp " . number_format($totalOrder); ?></div> -->

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">

                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Amount Due <?= date('Y-m-d', strtotime($payment_info->created_at)) ?></p>

                                <div class="table-responsive">
                                    <table class="table">

                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td><?= "Rp " . number_format($totalOrder); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ongkir</th>
                                            <td><?php echo "Rp. " . number_format($shipping_info->ongkirValue); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td><?php echo "Rp. " . number_format($order_info->order_total) ?> </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <button onclick="window.print()" class="btn btn-primary float-right" style="margin-right: 5px;"><i class="fas fa-print"></i></button>
                                <!-- <a href="<?= site_url('ManageOrder/printPDF/' . $order_info->order_id); ?>" class="btn btn-primary float-right" style="margin-right: 5px;"><i class="fas fa-print"></i> Print</a> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>