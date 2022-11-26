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
                    <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambahkan</button>
                </div>
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
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
                            <th>Kelas</th>
                            <th>Wali Kelas</th>
                            <th width="150px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kelas as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $value['kelas'] ?></td>
                                <td><?= $value['wali_kelas'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_kelas']  ?>"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_kelas']  ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

    <!-- modal add -->
    <div class="modal fade" id="add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Kelas</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('kelas/add');
                    ?>

                    <div class="form-group">
                        <label>Kelas</label>
                        <input name="kelas" class="form-control" placeholder="Kelas" required>
                    </div>

                    <div class="form-group">
                        <label>Wali Kelas</label>
                        <select name="wali_kelas" class="form-control">
                            <option value="">--Pilih Wali Kelas--</option>
                            <?php foreach ($guru as $key => $value) { ?>
                                <option value="<?= $value['nama_guru'] ?>"><?= $value['nama_guru'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- modal edit -->
    <?php foreach ($kelas as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value['id_kelas'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Kelas</h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        echo form_open('kelas/edit/' . $value['id_kelas']);
                        ?>

                        <div class="form-group">
                            <label>Kelas</label>
                            <input name="kelas" value="<?= $value['kelas'] ?>" class="form-control" placeholder="Kelas" required>
                        </div>

                        <div class="form-group">
                            <label>Wali Kelas</label>
                            <select name="wali_kelas" class="form-control">
                                <option value="">--Pilih Wali Kelas--</option>
                                <?php foreach ($guru as $key => $value) { ?>
                                    <option value="<?= $value['nama_guru'] ?>"><?= $value['nama_guru'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php } ?>

    <!-- modal delete -->
    <?php foreach ($kelas as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_kelas'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Hapus Kelas</h4>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus Kelas <b><?= $value['kelas'] ?>?</b>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                        <a href="<?= base_url('kelas/delete/' . $value['id_kelas']) ?>" class="btn btn-success">Hapus</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php } ?>