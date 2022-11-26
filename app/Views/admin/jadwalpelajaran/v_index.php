<section class="content-header">
    <h1>
        <?= $title ?> Tahun Pelajaran : <?= $tp_aktif['tp'] ?> (Semester <?= $tp_aktif['semester'] ?>)
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $title ?></h3>

                <div class="box-tools pull-right">
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>Kelas</th>
                            <th>Wali Kelas</th>
                            <th width="150px" class="text-center">Jadwal </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kelas as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $value['kelas'] ?></td>
                                <td><?= $value['wali_kelas'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('jadwalpelajaran/detail_jadwal/' . $value['id_kelas']) ?>" class="btn btn-success btn-flat btn-sm"><i class="fa fa-calendar"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>