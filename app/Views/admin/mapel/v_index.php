<section class="content-header">
    <h1>
        <?= $title ?>
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
                            <!-- <th>Kode Mata Pelajaran</th> -->
                            <!-- <th>Mata Pelajaran</th> -->
                            <th>Jumlah Mata Pelajaran</th>
                            <th width="150px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db = \config\Database::connect();
                        $no = 1;
                        foreach ($mapel as $key => $value) {
                            $jml = $db->table('tbl-mapel')
                                ->where('id_kelas', $value['id_kelas'])
                                ->countAllResults();
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $value['kelas'] ?></td>
                                <td><?= $jml ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('mapel/detail/' . $value['id_kelas']) ?>" class="btn btn-warning"><i class="fa fa-th-list"> Tambah Mata Pelajaran</i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>