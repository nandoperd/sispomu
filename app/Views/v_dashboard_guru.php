<!-- <h1>halaman Guru</h1> -->
<div class="row">
    <div class="col-md-4">

        <!-- Profile Image -->
        <div class="box box-success">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="<?= base_url('foto_guru/' . $guru['foto_guru']) ?>" alt="User profile picture">

                <h3 class="profile-username text-center"><?= $guru['nama_guru'] ?></h3>

                <p class="text-muted text-center"><?= $guru['kode_guru'] ?></p>

                <ul class="list-group list-group-unbordered">
                    <!-- <li class="list-group-item"> -->
                    <table class="table table-responsive">
                        <!-- <tr>
                            <th>Mata Pelajaran</th>
                            <th>:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Rombongan Belajar</th>
                            <th>:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Wali Kelas</th>
                            <th>:</th>
                            <td></td>
                        </tr> -->
                    </table>
                    <!-- </li> -->
                </ul>

                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-8">
        <div class="callout bg-green">
            <h4>Halo <b><?= session()->get('nama') ?></b>,</h4>
            <h4>Selamat datang di SISPOMU, Anda telah login sebagai <b> <?php if (session()->get('level') == 1) {
                                                                            echo 'Admin';
                                                                        } elseif (session()->get('level') == 2) {
                                                                            echo 'Guru';
                                                                        } elseif (session()->get('level') == 3) {
                                                                            echo 'Siswa';
                                                                        } elseif (session()->get('level') == 4) {
                                                                            echo 'Siswa';
                                                                        } ?></b>.</h4>

        </div>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h8>Jadwal</h8>
                        <br><br><br><br>
                    </div>
                    <div class="icon">
                        <i class="fa fa-th-list"></i>
                    </div>
                    <a href="<?= base_url('halguru/jadwal') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h8>Absensi</h8>
                        <br><br><br><br>
                    </div>
                    <div class="icon">
                        <i class="fa fa-calendar-check-o"></i>
                    </div>
                    <a href="<?= base_url('halguru/absen_siswa') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h8>Nilai</h8>
                        <br><br><br><br>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-o"></i>
                    </div>
                    <a href="<?= base_url('halguru/nilai_siswa') ?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h8>Keluar</h8>
                        <br><br><br><br>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-out"></i>
                    </div>
                    <a href="<?= base_url('auth/logout') ?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>