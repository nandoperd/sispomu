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
                    <a href="<?= base_url('siswa/add') ?>" class="btn btn-box-tool"><i class="fa fa-plus"></i> Tambahkan</a>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>
                <!-- The body of the box -->
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Password</th>
                            <th>Kelas</th>
                            <th>Foto</th>
                            <th width="150px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($siswa as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $value['nis'] ?></td>
                                <td><?= $value['nama_siswa'] ?></td>
                                <td><?= $value['password'] ?></td>
                                <td><?= $value['kelas'] ?></td>
                                <td><img src="<?= base_url('foto_siswa/' . $value['foto_siswa']) ?>" class="img-circle" width="35px" height="35px"></td>
                                <td class="text-center">
                                    <a href="<?= base_url('siswa/edit/' . $value['id_siswa']) ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_siswa']  ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

    <!-- modal delete -->
    <?php foreach ($siswa as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_siswa'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Hapus Data Siswa</h4>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus Data Siswa <b><?= $value['nama_siswa'] ?>?</b>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                        <a href="<?= base_url('siswa/delete/' . $value['id_siswa']) ?>" class="btn btn-success">Hapus</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php } ?>