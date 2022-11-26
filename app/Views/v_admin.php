<div class="callout bg-green">
    <h4>Halo <b><?= session()->get('nama') ?></b>,</h4>
    <h4>Selamat datang di SISPOMU, Anda telah login sebagai <b> <?php if (session()->get('level') == 1) {
                                                                    echo 'Admin';
                                                                } elseif (session()->get('level') == 2) {
                                                                    echo 'Guru';
                                                                } elseif (session()->get('level') == 3) {
                                                                    echo 'Siswa';
                                                                } ?></b>.</h4>

</div>

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $jml_kelas ?></h3>

                <p>Kelas</p>
            </div>
            <div class="icon">
                <i class="fa fa-institution"></i>
            </div>
            <a href="<?= base_url('kelas') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $jml_rombel ?></h3>

                <p>Rombongan Belajar</p>
            </div>
            <div class="icon">
                <i class="fa fa-group"></i>
            </div>
            <a href="<?= base_url('rombel') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $jml_guru ?></h3>

                <p>Guru</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="<?= base_url('guru') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $jml_siswa ?></h3>

                <p>Siswa</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= base_url('siswa') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-navy">
            <div class="inner">
                <h3><?= $jml_mapel ?></h3>

                <p>Mata Pelajaran</p>
            </div>
            <div class="icon">
                <i class="fa fa-server"></i>
            </div>
            <a href="<?= base_url('mapel') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
            <div class="inner">
                <h3><?= $jml_user ?></h3>

                <p>User</p>
            </div>
            <div class="icon">
                <i class="fa fa-key"></i>
            </div>
            <a href="<?= base_url('user') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>