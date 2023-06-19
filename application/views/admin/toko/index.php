<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col connectedSortable">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">E-Shop</h3>
                            <?= form_error('products', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <form action="<?php echo base_url(); ?>toko/createdToko" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputTitle">Nama Toko</label>
                                    <input type="text" class="form-control col-5" name="nama_toko" id="fileInput" placeholder="Input Title" value="<?php echo set_value('nama_toko'); ?>" />
                                    <small class="text-danger"><?= form_error('nama_toko'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="inputTitle">Alamat Toko</label>
                                    <input type="text" class="form-control col-8" name="alamat_toko" id="fileInput" placeholder="Input Title" value="<?php echo set_value('alamat_toko'); ?>" />
                                    <small class="text-danger"><?= form_error('alamat_toko'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Description</label>
                                    <textarea name="description" id="summernote"></textarea>
                                </div>
                                <span><small class="badge text-danger"><?= form_error('description') ?></small></span>

                                <div class="form-group">
                                    <label for="fileInput">Profile</label>
                                    <input type="file" class="form-control col-md-3" name="profile" id="fileInput" onchange="previewImage(event)" />
                                    <img id="preview" src="#" alt="Product Image" style="max-width: 200px; max-height: 200px; margin-top: 10px; display: none;">
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fileInput">Phone</label>
                                            <input class="form-control" name="phone" id="fileInput" type="number" value="<?= set_value('phone'); ?>" />
                                            <small class="text-danger"><?= form_error('phone'); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('preview');
            preview.src = reader.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>