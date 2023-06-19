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
                        <li class="breadcrumb-item active"><?= $title; ?></li>
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
                    <a class="btn btn-primary mb-3" href="<?php echo base_url(); ?>product/create"><i class="fas fa-folder-plus"></i>New Created</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Table Produk</h3>
                            <?= form_error('products', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
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
                                        <th>title</th>
                                        <th>category</th>
                                        <th>image</th>
                                        <th>price</th>
                                        <!-- <th>des</th> -->
                                        <th>quantity</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($products as $key) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $key['product_title']; ?></td>
                                            <td>
                                                <?php foreach ($categories as $category) : ?>
                                                    <?php if ($category['id'] == $key['product_category']) : ?>
                                                        <?php echo $category['category_name']; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </td>
                                            <td>
                                                <div class="row" id="gallery" data-toggle="modal" data-target="#exampleModal<?= $key['product_id']; ?>">
                                                    <div class="col-12 col-sm-6 col-lg-3">
                                                        <span class="badge bg-primary text-white"><i class="fas fa-fw fa-eye"></i></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <!-- <td><?php echo htmlspecialchars_decode($key['product_description']); ?></td> -->
                                            <td><?= $key['product_price']; ?></td>
                                            <td><?= $key['product_quantity']; ?></td>
                                            <td style=" text-align: center;">
                                                <?php if ($key['publication_status'] == 1) : ?>
                                                    <span class="badge bg-primary text-white"><i class="far fa-check-circle"></i></span>

                                                <?php else : ?>
                                                    <span class="badge bg-danger text-white"><i class="far fa-check-circle"></i></span>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align: center;"><span class="tag tag-success">
                                                    <a href="<?= base_url(); ?>product/edit/<?= $key['product_id']; ?>" class="badge badge-primary"><i class="fas fa-edit"></i></a>

                                                    <a href="<?= base_url(); ?>product/delete/<?= $key['product_id']; ?>" onclick="return confirm('Yakin ?? Confirm??')" class="badge badge-danger"><i class="fas fa-trash-alt"></i></a>
                                                </span>
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


<?php
$i = 0;
foreach ($products as $key) : $i++;
?>
    <div class="modal fade" id="exampleModal<?= $key['product_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $key['product_title']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="image-item active">
                        <img class="w-100" src="<?php echo base_url('uploads/' . $key['product_image']); ?>" alt="Product Image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>