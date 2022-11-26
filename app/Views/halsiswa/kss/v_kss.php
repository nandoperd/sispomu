<section class="content-header">
    <h1>
        <?= $title ?> Tahun Pelajaran : <?= $tp_aktif['tp'] ?>(<?= $tp_aktif['semester'] ?>)
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-12">

        <table class="table-striped table-responsive">

            <tr>
                <th rowspan="6"><img src="<?= base_url('foto_siswa/' . $halsiswa['foto_siswa']) ?>" height="170px" width="120px"></th>
                <th width="150px">Tahun Pelajaran</th>
                <th width="20px">:</th>
                <th><?= $tp_aktif['tp'] ?> (<?= $tp_aktif['semester'] ?>)</th>
                <th rowspan="6"></th>
            </tr>
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td><?= $halsiswa['nis'] ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $halsiswa['nama_siswa'] ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?= $halsiswa['kelas'] ?></td>
            </tr>
            <tr>
                <td>Rombongan Belajar</td>
                <td>:</td>
                <td><?= $halsiswa['nama_rombel'] ?></td>
            </tr>
            <tr>
                <td>Wali Kelas</td>
                <td>:</td>
                <td><?= $halsiswa['nama_guru'] ?></td>
            </tr>

        </table>
    </div>
    <div class="col-sm-12">
        <button class="btn btn-xs btn-flat btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah KSS</button>
        <a href="<?= base_url('kss/print') ?>" target="blank" class=" btn btn-xs btn-flat btn-success"><i class="fa fa-print"></i> Cetak KSS</a>
    </div>
    <div class="col-sm-12">
        <?php
        if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
        ?>
        <table class="table table-striped table-bordered table-responsive">
            <tr class="label-success">
                <th class="text-center">#</th>
                <th class="text-center">Kode</th>
                <th>Mata Pelajaran</th>
                <th class="text-center">KKM</th>
                <th class="text-center">SMT</th>
                <th>Rombongan Belajar</th>
                <th>Guru</th>
                <th>Hari / Waktu</th>
                <th class="text-center">Aksi</th>
            </tr>
            <?php $no = 1;
            $db = \config\Database::connect();
            foreach ($data_mapel as $key => $value) {
                $jml = $db->table('tbl-kss')
                    ->where('id_siswa', $value['id_siswa'])
                    ->countAllResults();
            ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center"><?= $value['kode_mapel'] ?></td>
                    <td><?= $value['nama_mapel'] ?></td>
                    <td class="text-center"><?= $value['kkm'] ?></td>
                    <td class="text-center"><?= $value['smt'] ?></td>
                    <td><?= $value['nama_rombel'] ?></td>
                    <td><?= $value['nama_guru'] ?></td>
                    <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                    <td class="text-center"><button class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_kss'] ?>"><i class="fa fa-trash"></i></button></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<!-- modal add -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Daftar Mata Pelajaran</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped text-sm" id="example1">
                    <thead>
                        <tr class="label-success">
                            <th>No</th>
                            <th class="text-center">Kode</th>
                            <th>Mata Pelajaran</th>
                            <th class="text-center">KKM</th>
                            <th class="text-center">SMT</th>
                            <th>Waktu</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($matapelajaran as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $value['kode_mapel'] ?></td>
                                <td><?= $value['nama_mapel'] ?></td>
                                <td class="text-center"><?= $value['kkm'] ?></td>
                                <td class="text-center"><?= $value['smt'] ?></td>
                                <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('kss/tambah_mapel/' . $value['id_jadwal']) ?>" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal delete -->
<?php foreach ($data_mapel as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_kss'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Data KSS</h4>
                </div>
                <div class="modal-body">

                    Apakah Anda Yakin Ingin Menghapus Data Pelajaran <b><?= $value['nama_mapel'] ?></b>?

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('kss/delete/' . $value['id_kss']) ?>" class="btn btn-success">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>