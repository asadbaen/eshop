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
                            <h3 class="card-title">Create Product</h3>
                            <?= form_error('products', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <form action="<?php echo base_url(); ?>product/saveCreated" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputTitle">Product Title</label>
                                    <input type="text" class="form-control col-5" name="product_title" id="fileInput" placeholder="Input Title" value="<?php echo set_value('product_title'); ?>" />
                                    <small class="text-danger"><?= form_error('product_title'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Product Description</label>
                                    <textarea name="product_description" id="summernote"></textarea>
                                </div>
                                <span><small class="badge text-danger"><?= form_error('product_description') ?></small></span>

                                <div class="form-group">
                                    <label for="fileInput">Product Image</label>
                                    <input type="file" class="form-control col-md-3" name="product_image" id="fileInput" onchange="previewImage(event)" />
                                    <img id="preview" src="#" alt="Product Image" style="max-width: 200px; max-height: 200px; margin-top: 10px; display: none;">
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fileInput">Product Price</label>
                                            <input class="form-control" name="product_price" id="fileInput" type="number" value="<?= set_value('product_price'); ?>" />
                                            <small class="text-danger"><?= form_error('product_price'); ?></small>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fileInput">Product Quantity</label>
                                            <input class="form-control" name="product_quantity" id="fileInput" type="number" value="<?= set_value('product_quantity'); ?>" />
                                            <small class="badge text-danger"><?= form_error('product_quantity'); ?></small>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fileInput">Product Category</label>
                                            <select class="form-control" name="product_category">
                                                <?php foreach ($setCategory as $single_category) { ?>
                                                    <option value="<?php echo $single_category['id']; ?>"><?php echo $single_category['category_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fileInput">Product Brand</label>
                                            <select class="form-control" name="product_brand">
                                                <?php foreach ($setBrand as $single_brand) { ?>
                                                    <option value="<?php echo $single_brand['brand_id']; ?>"><?php echo $single_brand['brand_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Publication</h3>
                                        </div>
                                        <div class="card-body">
                                            <?php $status = isset($status) ? $status : false; ?>

                                            <input type="checkbox" value="1" name="publication_status" id="publication_status" <?php echo ($status) ? 'checked' : ''; ?> data-on-color="success" data-off-color="danger" data-bootstrap-switch>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

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