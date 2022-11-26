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
            <th class="text-center">Kelas</th>
            <th>Hari / Waktu</th>
            <th>Mata Pelajaran</th>
            <th class="text-center">KKM</th>
            <th class="text-center">Rombongan Belajar</th>
        </tr>
        <?php
        $no = 1;
        foreach ($jadwal as $key => $value) { ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-center"><?= $value['kelas'] ?></td>
                <td><?= $value['hari'] ?> / <?= $value['waktu'] ?></td>
                <td><?= $value['nama_mapel'] ?></td>
                <td class="text-center"><?= $value['kkm'] ?></td>
                <td class="text-center"><?= $value['nama_rombel'] ?></td>
            </tr>

        <?php } ?>
    </table>
</div>