<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">


                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
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
                <!-- Content -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update <small>Menu Name</small></h3>
                            <?= form_error('submenu', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url(); ?>menu/updateSubmenu" method="post" id="quickForm" novalidate="novalidate">
                            <input type="hidden" name="user_submenu_id" id="user_submenu_id" value="<?= $submenu['user_submenu_id']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Menu</label>
                                    <input type="text" name="title" class="form-control" id="title" value="<?= $submenu['title']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="menu">Menu</label>
                                    <select name="user_menu_id" id="user_menu_id" class="form-control">
                                        <?php foreach ($menu as $key) : ?>
                                            <option value="<?= $key['user_menu_id']; ?>" <?php if ($key['user_menu_id'] == $submenu['user_menu_id']) echo 'selected'; ?>>
                                                <?= $key['menu']; ?>
                                            </option>

                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input type="text" name="url" class="form-control" id="url" value="<?= $submenu['url']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <input type="text" name="icon" class="form-control" id="icon" value="<?= $submenu['icon']; ?>">
                                </div>
                                <div class="form-group">
                                    <!-- Bootstrap Switch -->
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Status Active</h3>
                                        </div>
                                        <div class="card-body">
                                            <?php $is_active = isset($submenu['is_active']) ? $submenu['is_active'] : 1; ?>
                                            <input type="checkbox" value="1" name="is_active" id="is_active" <?php echo ($is_active) ? 'checked' : ''; ?> data-on-color="success" data-off-color="danger" data-bootstrap-switch>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" name="updateSubmenu" id="updateSubmenu" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.Content -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>