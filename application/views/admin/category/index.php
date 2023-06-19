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
                    <div class="btn btn-primary mb-3" data-toggle="modal" data-target="#newCategoryModel"><i class="fas fa-folder-plus"></i> Add Category</div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Table Category</h3>
                            <?= form_error('category_name', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                            <?= $this->session->flashdata('message'); ?>
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
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead style="text-transform: uppercase;">
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Descriptions</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($category as $key) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $key['category_name']; ?></td>
                                            <td><?= $key['category_description']; ?></td>
                                            <td style="text-align: center;">
                                                <?php if ($key['published'] == 1) : ?>
                                                    <span class="badge bg-primary text-white"><i class="far fa-check-circle"></i></span>

                                                <?php else : ?>
                                                    <span class="badge bg-danger text-white"><i class="far fa-check-circle"></i></span>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align: center;"><span class="tag tag-success">
                                                    <a href="" class="badge badge-primary" data-toggle="modal" data-target="#updateCategoryModel<?= $key['id']; ?>"><i class="fas fa-edit"></i></a>

                                                    <a href="<?= base_url(); ?>category/delete/<?= $key['id']; ?>" onclick="return confirm('Yakin ?? Confirm??')" class="badge badge-danger"><i class="fas fa-trash-alt"></i></a>
                                                </span></td>
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
<div class="modal fade" id="newCategoryModel" tabindex="-1" role="dialog" aria-labelledby="newCategoryModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newCategoryModelLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Input Category Name">
                    </div>
                    <small class="text-danger"><?= form_error('category_name'); ?></small>
                    <div class="form-group">
                        <input type="text" class="form-control" id="category_description" name="category_description" placeholder="Input Description" value="<?= set_value('category_description'); ?>">
                    </div>
                    <small class="text-danger"><?= form_error('category_description'); ?></small>
                    <div class="form-group">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Published Active</h3>
                            </div>
                            <div class="card-body">
                                <?php $published = isset($published) ? $published : false; ?>

                                <input type="checkbox" value="1" name="published" id="published" <?php echo ($published) ? 'checked' : ''; ?> data-on-color="success" data-off-color="danger" data-bootstrap-switch>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal Updated-->
<?php $i = 0;
foreach ($category as $key) : $i++;
?>
    <div class="modal fade" id="updateCategoryModel<?= $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateCategoryModelLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCategoryModelLabel">Updated Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url(); ?>category/saveUpdate" method="post">
                    <input type="hidden" name="id" id="id" value="<?= $key['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="category_name" name="category_name" value="<?= $key['category_name']; ?>">
                        </div>
                        <small class="text-danger"><?= form_error('category_name'); ?></small>
                        <div class="form-group">
                            <input type="text" class="form-control" id="category_description" name="category_description" value="<?= $key['category_description']; ?>">
                        </div>
                        <small class="text-danger"><?= form_error('category_description'); ?></small>
                        <div class="form-group">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Published Active</h3>
                                </div>
                                <div class="card-body">
                                    <?php $published = isset($key['published']) ? $key['published'] : false; ?>
                                    <input type="checkbox" value="1" name="published" id="published" <?php echo ($published) ? 'checked' : ''; ?> data-on-color="success" data-off-color="danger" data-bootstrap-switch>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

<?php endforeach; ?>