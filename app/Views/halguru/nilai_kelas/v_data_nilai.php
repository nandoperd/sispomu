<section class="content-header">
    <h1>
        <a href="<?= base_url('halguru/nilai_siswa') ?>">Data Nilai</a> <?= $jadwal['nama_rombel'] ?> TP : <?= $tp['tp'] ?> (<?= $tp['semester'] ?>)
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-12">

        <table class="table-striped table-responsive">

            <tr>
                <td>Kelas</td>
                <td width="30px" class="text-center">:</td>
                <td><?= $jadwal['kelas'] ?></td>
            </tr>
            <tr>
                <td>Kode Mapel</td>
                <td width="30px" class="text-center">:</td>
                <td><?= $jadwal['kode_mapel'] ?></td>
            </tr>
            <tr>
                <td>Mata Pelajaran</td>
                <td width="30px" class="text-center">:</td>
                <td><?= $jadwal['nama_mapel'] ?></td>
            </tr>
            <tr>
                <td>Guru</td>
                <td width="30px" class="text-center">:</td>
                <td><?= $jadwal['nama_guru'] ?></td>
            </tr>
            <tr>
                <td>Jadwal</td>
                <td width="30px" class="text-center">:</td>
                <td><?= $jadwal['hari'] ?>, <?= $jadwal['waktu'] ?></td>
            </tr>

        </table>
    </div>
    <div class="col-sm-12">
        <a href="<?= base_url('halguru/print_nilai/' . $jadwal['id_jadwal']) ?>" target="blank" class=" btn btn-flat btn-success"><i class="fa fa-print"></i> Print Nilai</a>
        <!-- <button class="btn btn-success btn-flat pull-right"><i class="fa fa-save"></i> Simpan</button> -->
    </div>
    <div class="col-sm-12">
        <?php
        if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
        ?>
        <?php echo form_open('halguru/SimpanNilai/' . $jadwal['id_jadwal']) ?>
        <table class="table table-striped table-bordered table-responsive table-xs text-sm">
            <tr class="label-success">
                <th rowspan="2" class="text-center">No</th>
                <th rowspan="2" class="text-center">NIS</th>
                <th rowspan="2" class="text-center">Nama</th>
                <th rowspan="2" class="text-center" width="75px">Absensi </th>
                <th colspan="3" class="text-center">Tugas</th>
                <th rowspan="2" class="text-center" width="75px">PTS</th>
                <th rowspan="2" class="text-center" width="75px">PAS</th>
                <th rowspan="2" class="text-center" width="75px">NA</th>
                <th rowspan="2" class="text-center" width="75px">Huruf</th>
                <th rowspan="2" class="text-center" width="75px">Keterangan</th>
            </tr>
            <tr class="label-success">
                <th class="text-center" width="75px">Tugas 1</th>
                <th class="text-center" width="75px">Tugas 2</th>
                <th class="text-center" width="75px">Tugas 3</th>
            </tr>
            <?php $no = 1;
            foreach ($siswa as $key => $value) {
                echo form_hidden($value['id_kss'] . 'id_kss', $value['id_kss']);
            ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center"><?= $value['nis'] ?></td>
                    <td><?= $value['nama_siswa'] ?></td>
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
                                                echo form_hidden($value['id_kss'] . 'absen', number_format($absensi, 0));
                                                ?></td>
                    <td><input name="<?= $value['id_kss'] ?>nilai_tugas1" value="<?= $value['nilai_tugas1'] ?>" class="form-control"></td>
                    <td><input name="<?= $value['id_kss'] ?>nilai_tugas2" value="<?= $value['nilai_tugas2'] ?>" class="form-control"></td>
                    <td><input name="<?= $value['id_kss'] ?>nilai_tugas3" value="<?= $value['nilai_tugas3'] ?>" class="form-control"></td>
                    <td><input name="<?= $value['id_kss'] ?>nilai_pts" value="<?= $value['nilai_pts'] ?>" class="form-control"></td>
                    <td><input name="<?= $value['id_kss'] ?>nilai_pas" value="<?= $value['nilai_pas'] ?>" class="form-control"></td>
                    <td class="text-center"><?= $value['nilai_akhir'] ?></td>
                    <td class="text-center"><?= $value['nilai_huruf'] ?></td>
                    <td class="text-center"><?= $value['nilai_huruf'] ?></td>
                </tr>
            <?php } ?>
        </table>
        <button class="btn btn-success btn-flat pull-right"><i class="fa fa-save"></i> Simpan</button>
        <?php echo form_close() ?>
    </div>
</div>