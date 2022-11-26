<section class="content-header">
    <h1>
        <?= $title ?> TP : <?= $tp['tp'] ?> (<?= $tp['semester'] ?>)
    </h1>
    <br>
</section>

<div class="row">
    <table class="table table-striped table-bordered table-responsive">
        <tr class="label-success">
            <th class="text-center">No</th>
            <th class="text-center">Kode</th>
            <th>Mata Pelajaran</th>
            <th class="text-center">KKM</th>
            <th class="text-center">Kelas</th>
            <th class="text-center">Aksi</th>
        </tr>
        <?php
        $no = 1;
        foreach ($absen as $key => $value) { ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-center"><?= $value['kode_mapel'] ?></td>
                <td><?= $value['nama_mapel'] ?></td>
                <td class="text-center"><?= $value['kkm'] ?></td>
                <td class="text-center"><?= $value['kelas'] ?></td>
                <td class="text-center">
                    <a href="<?= base_url('halguru/absensi/' . $value['id_jadwal']) ?>" class="btn btn-success btn-sm btn-flat">
                        <i class="fa fa-calendar"></i> Absensi
                    </a>
                </td>
            </tr>

        <?php } ?>
    </table>
</div>