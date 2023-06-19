<section class="shop checkout section">
    <div class="container" style="display: flex; justify-content: center;">
        <div class="col-lg-4 col-12">
            <div class="order-details">
                <div class="single-widget">
                    <h2>Pilih Metode Pembayaran</h2>
                    <span class="badge text-bg-danger"><?php echo $this->session->flashdata('message'); ?></span>
                </div>
                <div class="single-widget">
                    <div class="content">
                        <form action="<?php echo base_url('save/order'); ?>" method="POST">
                            <div class="mb-3 m-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Rekening">
                            </div>
                            <div class="mb-3 m-3">
                                <label class="form-label">Tampil no Rekening</label>
                                <input type="text" id="account_number" readonly name="account_number" class="form-control">
                            </div>
                            <div class="mb-3 m-3">
                                <label class="form-label">Pilih Bank</label>
                                <select id="bank" name="bank_name" class="form-control">
                                    <option value="" selected>Pilih Bank</option>
                                    <option value="BRI">BRI</option>
                                    <option value="BNI">BNI</option>
                                    <option value="BCA">BCA</option>
                                    <option value="Mandiri">Mandiri</option>
                                </select>
                            </div>
                            <?php if (!empty($totalBelanja)) : ?>
                                <h2>Total Tagihan: <?php echo 'Rp ' . number_format($totalBelanja); ?></h2>
                            <?php else : ?>
                                <h2>Belum ada data total belanja.</h2>
                            <?php endif; ?>

                            <input type="hidden" name="totalBelanja" value="<?php echo $totalBelanja; ?>">
                            <br />
                            <div class="content">
                                <div class="single-widget get-button">
                                    <div class="content">
                                        <div class="button">
                                            <button type="submit" class="btn">Bayar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Ketika pilihan bank berubah
        $('#bank').change(function() {
            var bank_id = $(this).val();
            var bank_bri = '1021930129301301';
            var bank_bni = '7878278129301301';
            var bank_bca = '8638183929301301';
            var bank_mandiri = '1993828929301301';

            var account_number;

            // Periksa bank_id untuk mendapatkan nomor rekening yang sesuai
            if (bank_id === 'BRI') {
                account_number = bank_bri;
            } else if (bank_id === 'BNI') {
                account_number = bank_bni;
            } else if (bank_id === 'BCA') {
                account_number = bank_bca;
            } else if (bank_id === 'Mandiri') {
                account_number = bank_mandiri;
            } else {
                account_number = '';
            }

            // Update nomor rekening di halaman
            $('#account_number').val(account_number);
        });
    });
</script>