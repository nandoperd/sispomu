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
        <a href="<?= base_url('halsiswa/print_rapor') ?>" target="blank" class=" btn btn-xs btn-flat btn-success"><i class="fa fa-print"></i> Cetak Nilai</a>
    </div>
    <div class="col-sm-12">
        <table class="table table-striped table-bordered table-responsive">
            <tr class="label-success">
                <th rowspan="2" class="text-center">No</th>
                <th rowspan="2" class="text-center">Kode</th>
                <th rowspan="2">Mata Pelajaran</th>
                <th rowspan="2" class="text-center">KKM</th>
                <th rowspan="2" class="text-center">SMT</th>
                <th colspan="4" class="text-center">Nilai</th>
                <th rowspan="2" class="text-center">NA</th>
                <th rowspan="2" class="text-center">NH</th>
            </tr>
            <tr class="label-success">
                <th class="text-center" width="75px">Absensi</th>
                <th class="text-center" width="75px">Tugas</th>
                <th class="text-center" width="75px">PTS</th>
                <th class="text-center" width="75px">PAT</th>
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
                    <td class="text-center"> <?php
                                                $absensi = ($value['h1'] +
                                                    $value['h2'] +
                                                    $value['h3'] +
                                                    $value['h4'] +
                                                    $value['h5'] +
                                                    $value['h6'] +
                                                    $value['h7'] +
                                                    $value['h8'] +
                                                    $value['h9'] +
                                                    $value['h10'] +
                                                    $value['h11'] +
                                                    $value['h12'] +
                                                    $value['h13'] +
                                                    $value['h14'] +
                                                    $value['h15'] +
                                                    $value['h16'] +
                                                    $value['h17'] +
                                                    $value['h18'] +
                                                    $value['h19'] +
                                                    $value['h20'] +
                                                    $value['h21'] +
                                                    $value['h22'] +
                                                    $value['h23'] +
                                                    $value['h24'] +
                                                    $value['h25'] +
                                                    $value['h26'] +
                                                    $value['h27'] +
                                                    $value['h28'] +
                                                    $value['h29'] +
                                                    $value['h30'] +
                                                    $value['h31']) / 62 * 100;
                                                echo number_format($absensi, 0);
                                                ?></td>
                    <td class="text-center"><?= (($value['nilai_tugas1']) + ($value['nilai_tugas2']) + ($value['nilai_tugas3'])) / 3 ?></td>
                    <td class="text-center"><?= $value['nilai_pts'] ?></td>
                    <td class="text-center"><?= $value['nilai_pas'] ?></td>
                    <td class="text-center"><?= $value['nilai_akhir'] ?></td>
                    <td class="text-center"><?= $value['nilai_huruf'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>