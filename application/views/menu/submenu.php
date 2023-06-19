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
                    <div class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubmenuModal"><i class="fas fa-folder-plus"></i> Add New Menu </div>
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
                                        <th>title</th>
                                        <th>menu</th>
                                        <th>url</th>
                                        <th>icon</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($submenu as $sm) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $sm['title']; ?></td>
                                            <td><?= $sm['menu']; ?></td>
                                            <td><?= $sm['url']; ?></td>
                                            <td><?= $sm['icon']; ?></td>
                                            <td style="text-align: center;">
                                                <?php if ($sm['is_active'] == 1) : ?>
                                                    <span class="badge bg-primary text-white"><i class="far fa-check-circle"></i></span>

                                                <?php else : ?>
                                                    <span class="badge bg-danger text-white"><i class="far fa-check-circle"></i></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a class="badge badge-primary" href="<?= base_url(); ?>menu/submenu_edit/<?= $sm['user_submenu_id']; ?>" "><i class=" fas fa-edit"></i></a>

                                                <a class="badge badge-danger" href="<?= base_url(); ?>menu/destroy/<?= $sm['user_submenu_id']; ?>" onclick="return confirm('Yakin Ingin Menghapus???')"><i class="fas fa-trash-alt"></i></a>
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
<div class="modal fade" id="newSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubmenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubmenuModalLabel">Add Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php site_url('menu/subMenu') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="input new title">
                    </div>
                    <div class="form-group">
                        <select name="user_menu_id" id="user_menu_id" class="form-control">
                            <option value="">Select Menu</option>

                            <?php foreach ($menu as $key) : ?>
                                <option value="<?= $key['user_menu_id']; ?>"><?= $key['menu']; ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="input url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="input Icons">
                    </div>
                    <div class="form-group">
                        <!-- Bootstrap Switch -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Switch Active</h3>
                            </div>
                            <div class="card-body">
                                <?php $is_active = isset($submenu['is_active']) ? $submenu['is_active'] : false; ?>
                                <input type="checkbox" value="1" name="is_active" id="is_active" <?php echo ($is_active) ? 'checked' : ''; ?> data-on-color="success" data-off-color="danger" data-bootstrap-switch>
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