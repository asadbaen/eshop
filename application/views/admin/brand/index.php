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
                        <li class="breadcrumb-item active"><?php echo $title; ?></li>
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
                    <div class="btn btn-primary mb-3" data-toggle="modal" data-target="#newBrandModal"><i class="fas fa-folder-plus"></i> New Brand </div>
                    <div class="card">
                        <div class="card-header">
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>
                            <?= $this->session->flashdata('message'); ?>
                            <h3 class="card-title">Table Menu</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table table-bordered">
                                <thead>
                                    <tr style="text-align: center; text-transform: uppercase;">
                                        <th>ID</th>
                                        <th>Brand Name</th>
                                        <th>Descriptions</th>
                                        <th>Published</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($brand_list as $index) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $index['brand_name']; ?></td>
                                            <td><?= $index['brand_description']; ?></td>
                                            <td style="text-align: center;">
                                                <?php if ($index['publication_status'] == 1) : ?>
                                                    <span class="badge bg-primary text-white"><i class="far fa-check-circle"></i></span>

                                                <?php else : ?>
                                                    <span class="badge bg-danger text-white"><i class="far fa-check-circle"></i></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a class="badge badge-primary" data-toggle="modal" data-target="#updateBrandModal<?= $index['brand_id']; ?>" href="" "><i class=" fas fa-edit"></i></a>

                                                <a class="badge badge-danger" href="<?= base_url(); ?>brand/delete/<?= $index['brand_id']; ?>" onclick="return confirm('Yakin Ingin Menghapus???')"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<!-- Modal New ADD-->
<div class="modal fade" id="newBrandModal" tabindex="-1" role="dialog" aria-labelledby="newBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newBrandModalLabel">Add Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php site_url('brand') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleLabel">Brand Name</label>
                        <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="input new brand">
                    </div>
                    <div class="form-group">
                        <label for="exampleLabel">Description</label>
                        <textarea name="brand_description" id="summernote"></textarea>
                    </div>
                    <div class="form-group">
                        <!-- Bootstrap Switch -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Switch Active</h3>
                            </div>
                            <div class="card-body">
                                <?php $published = isset($brand_list['publication_status']) ? $brand_list['publication_status'] : false; ?>
                                <input type="checkbox" value="1" name="publication_status" id="publication_status" <?php echo ($published) ? 'checked' : ''; ?> data-on-color="success" data-off-color="danger" data-bootstrap-switch>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal Update -->
<?php $i = 0;
foreach ($brand_list as $index) : $i++;
?>
    <div class="modal fade" id="updateBrandModal<?= $index['brand_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateBrandModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateBrandModalLabel">Add Submenu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo site_url('brand/update') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="brand_id" id="brand_id" value="<?= $index['brand_id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleLabel">Brand Name</label>
                            <input type="text" class="form-control" id="brand_name" name="brand_name" value="<?= $index['brand_name']; ?>">
                        </div>
                        <div class="form-group">
                            <textarea class="summernote" name="brand_description"><?= $index['brand_description'] ?></textarea>

                        </div>
                        <div class="form-group">
                            <!-- Bootstrap Switch -->
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Switch Active</h3>
                                </div>
                                <div class="card-body">
                                    <?php $published = isset($index['publication_status']) ? $index['publication_status'] : false; ?>
                                    <input type="checkbox" value="1" name="publication_status" id="publication_status" <?php echo ($published) ? 'checked' : ''; ?> data-on-color="success" data-off-color="danger" data-bootstrap-switch>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

<?php endforeach; ?>