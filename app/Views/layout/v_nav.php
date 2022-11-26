<meta charset="UTF-8">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>

<link rel="stylesheet" href="assets/css/bootstrap.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>

<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">

        <!-- menghilangkan top bar di situasi sudah login admin -->
        <?php
        if (session()->get('level') == 1) {
        ?>
            <li><a href="<?= base_url('admin') ?>">Beranda </a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= base_url('tp') ?>">Tahun Pelajaran</a></li>
                    <li><a href="<?= base_url('user') ?>">User</a></li>
                    <li><a href="<?= base_url('guru') ?>">Guru</a></li>
                    <li><a href="<?= base_url('siswa') ?>">Siswa</a></li>
                    <li><a href="<?= base_url('kelas') ?>">Kelas</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akademik <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= base_url('rombel') ?>">Rombongan Belajar</a></li>
                    <li><a href="<?= base_url('mapel') ?>">Mata Pelajaran</a></li>
                    <li><a href="<?= base_url('jadwalpelajaran') ?>">Jadwal Pembelajaran</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= base_url('tp/setting') ?>">Tahun Pelajaran</a></li>
                    <!-- <li><a href="#">Guru</a></li> -->
                    <!-- <li><a href="#">Siswa</a></li> -->
                </ul>
            </li>

            <!-- <li><a href="#">About</a></li> -->
        <?php } elseif (session()->get('level') == 2) { ?>
            <li><a href="<?= base_url('halguru') ?>">Beranda </a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akademik <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= base_url('halguru/jadwal') ?>">Jadwal Mengajar</a></li>
                    <li><a href="<?= base_url('halguru/materi_siswa') ?>">Materi Pelajaran</a></li>
                    <li><a href="<?= base_url('halguru/absen_siswa') ?>">Absen Siswa</a></li>
                    <li><a href="<?= base_url('halguru/nilai_siswa') ?>">Nilai Siswa</a></li>
            </li>
        <?php } elseif (session()->get('level') == 4) { ?>
            <li><a href="<?= base_url('halsiswa') ?>">Beranda </a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akademik <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= base_url('kss') ?>">Kartu Studi Siswa (KSS)</a></li>
                    <li><a href="<?= base_url('halsiswa/absensi') ?>">Absensi</a></li>
                    <li><a href="<?= base_url('halsiswa/rapor_siswa') ?>">Nilai</a></li>
            </li>
        <?php } ?>
    </ul>
    <!-- <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
        </div>
    </form> -->
</div>
<!-- /.navbar-collapse -->
<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

        <!-- kondisi jika username kosong (logout) maka yg tampil tombol login -->
        <?php if (session()->get('username') == "") { ?>
            <li><a href="<?= base_url('auth') ?>"><i class="fa fa-sign-in"></i> Login</a></li>

            <!-- kondisi jika username ada maka tampil user, tutup php di bawah ada di atas ul  -->
        <?php } else { ?>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    <?php if (session()->get('level') == 1) { ?>
                        <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                    <?php } elseif (session()->get('level') == 2) { ?>
                        <img src="<?= base_url('foto_guru/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                    <?php } elseif (session()->get('level') == 4) { ?>
                        <img src="<?= base_url('foto_siswa/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                    <?php } elseif (session()->get('level') == 5) { ?>
                        <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                    <?php } ?>
                    <!-- membuat situasi foto profil  -->
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs"><?= session()->get('nama') ?></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">
                        <?php if (session()->get('level') == 1) { ?>
                            <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">
                        <?php } elseif (session()->get('level') == 2) { ?>
                            <img src="<?= base_url('foto_guru/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">
                        <?php } elseif (session()->get('level') == 4) { ?>
                            <img src="<?= base_url('foto_siswa/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">
                        <?php } elseif (session()->get('level') == 5) { ?>
                            <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">
                        <?php } ?>
                        <p>
                            <?= session()->get('nama') ?> - <?php if (session()->get('level') == 1) {
                                                                echo 'Admin';
                                                            } elseif (session()->get('level') == 2) {
                                                                echo session()->get('username');
                                                            } elseif (session()->get('level') == 3) {
                                                                echo 'Wali Kelas';
                                                            } elseif (session()->get('level') == 4) {
                                                                echo session()->get('username');
                                                            } elseif (session()->get('level') == 5) {
                                                                echo 'Kepala Sekolah';
                                                            } ?>

                            <!-- <small>Member since Nov. 2012</small> -->
                        </p>
                    </li>
                    <!-- Menu Body -->
                    <!-- <li class="user-body">
                    <div class="row">
                        <div class="col-xs-4 text-center">
                            <a href="#">Followers</a>
                        </div>
                        <div class="col-xs-4 text-center">
                            <a href="#">Sales</a>
                        </div>
                        <div class="col-xs-4 text-center">
                            <a href="#">Friends</a>
                        </div>
                    </div>
                    <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                    <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat">Logout</a>
                </div>
            </li>
        <?php } ?>
    </ul>
    </li>
    </ul>
</div>
<!-- /.navbar-custom-menu -->
</div>
<!-- /.container-fluid -->
</nav>
</header>

<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">