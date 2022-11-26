<section class="content-header">
    <h1>
        Setting <?= $title ?>
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $title ?></h3>

                <!-- <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambahkan</button>
                </div> -->
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
                            <th class="text-center">Tahun Pelajaran</th>
                            <th class="text-center">Semester</th>
                            <th class="text-center">Status</th>
                            <th width="150px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tp as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $value['tp'] ?></td>
                                <td class="text-center"><?= $value['semester'] ?></td>
                                <td class="text-center">
                                    <?php if ($value['status'] == 0) {
                                        echo '<p class="label text-center bg-red">Tidak Aktif</p>';
                                    } else {
                                        echo '<p class="label text-center bg-green">Aktif</p>';
                                    } ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($value['status'] == 0) { ?>
                                        <a href="<?= base_url('tp/set_status_tp/' . $value['id_tp']) ?>" class="btn btn-success"><i class="fa fa-check"></i> Aktifkan</a>
                                    <?php } ?>
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
                    <h4 class="modal-title">Tambah Mata Pelajaran</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('tp/add');
                    ?>

                    <div class="form-group">
                        <label>Tahun Pelajaran</label>
                        <input name="tp" class="form-control" placeholder="2022/2023" required>
                    </div>

                    <div class="form-group">
                        <label>Semester</label>
                        <select name="semester" class="form-control">
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>

                    <?php
                    ?>

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
    <?php foreach ($tp as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value['id_tp'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Tahun Pelajaran</h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        echo form_open('tp/edit/' . $value['id_tp']);
                        ?>

                        <div class="form-group">
                            <label>Tahun Pelajaran</label>
                            <input name="tp" value="<?= $value['tp'] ?>" class="form-control" placeholder="Tahun Pelajaran" required>
                        </div>

                        <div class="form-group">
                            <label>Semester</label>
                            <select name="semester" class="form-control">
                                <option value="Ganjil" <?php if ($value['semester'] == 'Ganjil') {
                                                            echo 'Selected';
                                                        } ?>>Ganjil</option>
                                <option value="Genap" <?php if ($value['semester'] == 'Genap') {
                                                            echo 'Selected';
                                                        } ?>>Genap</option>
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
    <?php foreach ($tp as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_tp'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Hapus Tahun Pelajaran</h4>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus Tahun Pelajaran <b><?= $value['tp'] ?>?</b>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                        <a href="<?= base_url('tp/delete/' . $value['id_tp']) ?>" class="btn btn-success">Hapus</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php } ?>