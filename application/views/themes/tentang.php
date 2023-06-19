<?php
$queryData = "select * from tbl_toko";

$dataToko = $this->db->query($queryData)->result_array();

?>

<?php foreach ($dataToko as $toko) : ?>
    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-content">
                        <h3>Welcome To <span><?= $toko['nama_toko']; ?></span></h3>
                        <p><?= htmlspecialchars_decode($toko['description']); ?></p>
                        <p><?= $toko['alamat_toko']; ?></p>
                        <div class="button">
                            <a class="btn primary"><?= $toko['phone'] ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="about-img overlay">
                        <img src="<?= base_url('uploads/' . $toko['profile']); ?>" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; ?>