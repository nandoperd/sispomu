<section class="content-header">
    <h1>
        <a href="<?= base_url('halguru/absen_siswa') ?>">Absensi</a> <?= $jadwal['nama_rombel'] ?> TP : <?= $tp['tp'] ?> (<?= $tp['semester'] ?>)
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
        <a href="<?= base_url('halguru/print_absensi/' . $jadwal['id_jadwal']) ?>" target="blank" class=" btn btn-flat btn-success"><i class="fa fa-print"></i> Print Absen</a>
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
        <?php echo form_open('halguru/SimpanAbsen/' . $jadwal['id_jadwal']) ?>
        <table class="table table-striped table-bordered table-responsive table-xs text-sm">
            <tr class="label-success">
                <th rowspan="2" class="text-center">No</th>
                <th rowspan="2" class="text-center">NIS</th>
                <th rowspan="2" class="text-center">Nama</th>
                <th colspan="31" class="text-center"><?= date('M') ?> (Pekan 1 & 2)</th>
                <!-- <th rowspan="2" class="text-center">%</th> -->
                <!-- <th rowspan="2" class="text-center">Izin</th>
        <th rowspan="2" class="text-center">Alfa</th> -->
            </tr>
            <tr class="label-success">
                <th class="text-sm text-center">1</th>
                <th class="text-sm text-center">2</th>
                <th class="text-sm text-center">3</th>
                <th class="text-sm text-center">4</th>
                <th class="text-sm text-center">5</th>
                <th class="text-sm text-center">6</th>
                <th class="text-sm text-center">7</th>
                <th class="text-sm text-center">8</th>
                <th class="text-sm text-center">9</th>
                <th class="text-sm text-center">10</th>
                <th class="text-sm text-center">11</th>
                <th class="text-sm text-center">12</th>
                <th class="text-sm text-center">13</th>
                <th class="text-sm text-center">14</th>
                <th class="text-sm text-center">15</th>
            </tr>
            <?php $no = 1;
            foreach ($siswa as $key => $value) {
                echo form_hidden($value['id_kss'] . 'id_kss', $value['id_kss']);
            ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center"><?= $value['nis'] ?></td>
                    <td><?= $value['nama_siswa'] ?></td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h1">
                            <option value="0" class="text-sm" <?php if ($value['h1'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h1'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h1'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h2">
                            <option value="0" class="text-sm" <?php if ($value['h2'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h2'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h2'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h3">
                            <option value="0" class="text-sm" <?php if ($value['h3'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h3'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h3'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h4">
                            <option value="0" class="text-sm" <?php if ($value['h4'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h4'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h4'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h5">
                            <option value="0" class="text-sm" <?php if ($value['h5'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h5'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h5'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h6">
                            <option value="0" class="text-sm" <?php if ($value['h6'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h6'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h6'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h7">
                            <option value="0" class="text-sm" <?php if ($value['h7'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h7'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h7'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h8">
                            <option value="0" class="text-sm" <?php if ($value['h8'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h8'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h8'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h9">
                            <option value="0" class="text-sm" <?php if ($value['h9'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h9'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h9'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h10">
                            <option value="0" class="text-sm" <?php if ($value['h10'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h10'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h10'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h11">
                            <option value="0" class="text-sm" <?php if ($value['h11'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h11'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h11'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h12">
                            <option value="0" class="text-sm" <?php if ($value['h12'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h12'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h12'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h13">
                            <option value="0" class="text-sm" <?php if ($value['h13'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h13'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h13'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h14">
                            <option value="0" class="text-sm" <?php if ($value['h14'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h14'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h14'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h15">
                            <option value="0" class="text-sm" <?php if ($value['h15'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h15'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h15'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <button class="btn btn-success btn-flat pull-right"><i class="fa fa-save"></i> Simpan</button>
        <table class="table table-striped table-bordered table-responsive table-xs text-sm">
            <tr class="label-success">
                <th rowspan="2" class="text-center">No</th>
                <th rowspan="2" class="text-center">NIS</th>
                <th rowspan="2" class="text-center">Nama</th>
                <th colspan="31" class="text-center"><?= date('M') ?> (Pekan 3 & 4)</th>
                <!-- <th rowspan="2" class="text-center">%</th> -->
                <!-- <th rowspan="2" class="text-center">Izin</th>
        <th rowspan="2" class="text-center">Alfa</th> -->
            </tr>
            <tr class="label-success">
                <th class="text-sm text-center">16</th>
                <th class="text-sm text-center">17</th>
                <th class="text-sm text-center">18</th>
                <th class="text-sm text-center">19</th>
                <th class="text-sm text-center">20</th>
                <th class="text-sm text-center">21</th>
                <th class="text-sm text-center">22</th>
                <th class="text-sm text-center">23</th>
                <th class="text-sm text-center">24</th>
                <th class="text-sm text-center">25</th>
                <th class="text-sm text-center">26</th>
                <th class="text-sm text-center">27</th>
                <th class="text-sm text-center">28</th>
                <th class="text-sm text-center">29</th>
                <th class="text-sm text-center">30</th>
                <th class="text-sm text-center">31</th>
            </tr>
            <?php $no = 1;
            foreach ($siswa as $key => $value) {
                echo form_hidden($value['id_kss'] . 'id_kss', $value['id_kss']);
            ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center"><?= $value['nis'] ?></td>
                    <td><?= $value['nama_siswa'] ?></td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h16">
                            <option value="0" class="text-sm" <?php if ($value['h16'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h16'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h16'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h17">
                            <option value="0" class="text-sm" <?php if ($value['h17'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h17'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h17'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h18">
                            <option value="0" class="text-sm" <?php if ($value['h18'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h18'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h18'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h19">
                            <option value="0" class="text-sm" <?php if ($value['h19'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h19'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h19'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h20">
                            <option value="0" class="text-sm" <?php if ($value['h20'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h20'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h20'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h21">
                            <option value="0" class="text-sm" <?php if ($value['h21'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h21'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h21'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h22">
                            <option value="0" class="text-sm" <?php if ($value['h22'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h22'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h22'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h23">
                            <option value="0" class="text-sm" <?php if ($value['h23'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h23'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h23'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h24">
                            <option value="0" class="text-sm" <?php if ($value['h24'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h24'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h24'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h25">
                            <option value="0" class="text-sm" <?php if ($value['h25'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h25'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h25'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h26">
                            <option value="0" class="text-sm" <?php if ($value['h26'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h26'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h26'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h27">
                            <option value="0" class="text-sm" <?php if ($value['h27'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h27'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h27'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h28">
                            <option value="0" class="text-sm" <?php if ($value['h28'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h28'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h28'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h29">
                            <option value="0" class="text-sm" <?php if ($value['h29'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h29'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h29'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h30">
                            <option value="0" class="text-sm" <?php if ($value['h30'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h30'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h30'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $value['id_kss'] ?>h31">
                            <option value="0" class="text-sm" <?php if ($value['h31'] == 0) {
                                                                    echo 'Selected';
                                                                } ?>>A</option>
                            <option value="1" class="text-sm" <?php if ($value['h31'] == 1) {
                                                                    echo 'Selected';
                                                                } ?>>I</option>
                            <option value="2" class="text-sm" <?php if ($value['h31'] == 2) {
                                                                    echo 'Selected';
                                                                } ?>>H</option>
                        </select>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <?php echo form_close() ?>
    </div>
</div>