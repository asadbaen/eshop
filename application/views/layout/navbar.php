<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                <!-- <span class="badge badge-warning navbar-badge">15</span> -->
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- <span class="dropdown-item dropdown-header">15 Notifications</span> -->
                <div class="dropdown-divider"></div>
                <div class="">
                    <!-- Profile Image -->
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/profile/') . $user['images']; ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= $user['username']; ?></h3>

                        <p class="text-muted text-center">Software Engineer</p>

                        <a href="<?= site_url('auth/logout'); ?>" onclick="return confirm('Apakah Anda yakin ??')" class="btn btn-danger btn-block"><b><i class="fa fa-power-off" aria-hidden="true"></i></b></a>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card -->
                </div>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->