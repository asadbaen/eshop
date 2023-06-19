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
                        <form action="<?php echo base_url(); ?>product/saveUpdated" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="product_id" id="product_id" value="<?= $products['product_id']; ?>">
                            <div class="card-body">
                                <div class="form-group col-5">
                                    <label for="inputTitle">Product Title</label>
                                    <input type="text" class="form-control" name="product_title" id="fileInput" value="<?= $products['product_title'] ?>" />
                                    <small class="text-danger"><?= form_error('product_title'); ?></small>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="inputDescription">Product Description</label>
                                    <textarea name="product_description" id="summernote"><?= $products['product_description']; ?></textarea>
                                </div>
                                <span><small class="badge text-danger"><?= form_error('product_description') ?></small></span>
                                <div class="form-group">
                                    <label for="fileInput">Product Image</label>
                                    <input type="file" class="form-control-file" name="product_image" id="fileInput" onchange="previewImage(event)" />
                                    <input name="product_delete_image" value="<?= base_url('uploads/' . $products['product_image']); ?>" type="hidden" />
                                    <small class="form-text text-muted">Max file size: 2MB</small>
                                    <div class="mt-2">
                                        <?php if ($products['product_image']) : ?>
                                            <img id="preview" src="<?= base_url('uploads/' . $products['product_image']); ?>" alt="Product Image" style="max-width: 200px; max-height: 200px;">
                                        <?php else : ?>
                                            <img id="preview" src="#" alt="Product Image" style="max-width: 200px; max-height: 200px; display: none;">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fileInput">Product Price</label>
                                            <input class="form-control" name="product_price" id="fileInput" type="number" value="<?= $products['product_price']; ?>" />
                                            <small class="text-danger"><?= form_error('product_price'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fileInput">Product Quantity</label>
                                            <input class="form-control" name="product_quantity" id="fileInput" type="number" value="<?= $products['product_quantity']; ?>" />
                                            <small class="badge text-danger"><?= form_error('product_quantity'); ?></small>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fileInput">Category</label>
                                            <select name="product_category" id="product_category" class="form-control">
                                                <?php foreach ($setCategory as $key) : ?>
                                                    <option value="<?= $key['id']; ?>" <?php if ($key['id'] == $products['product_category']) echo 'selected'; ?>>
                                                        <?= $key['category_name']; ?>
                                                    </option>

                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fileInput">Product Brand</label>
                                            <select class="form-control" name="product_brand">
                                                <?php foreach ($setBrand as $key) : ?>
                                                    <option value="<?= $key['brand_id']; ?>" <?php if ($key['brand_id'] == $products['product_brand']) echo 'selected'; ?>>
                                                        <?= $key['brand_name']; ?>
                                                    </option>

                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="card card-secondary col-md-3">
                                        <div class="card-header">
                                            <h3 class="card-title">Publication</h3>
                                        </div>
                                        <div class="card-body">
                                            <?php $status = isset($products['publication_status']) ? $products['publication_status'] : false; ?>
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