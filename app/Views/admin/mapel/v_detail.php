<section class="content-header">
    <h1>
        <a href="<?= base_url('mapel') ?>">Data <?= $title ?></a>
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="150px">Kelas</th>
                        <td width="30px">:</td>
                        <td><?= $kelas['kelas'] ?></td>
                    </tr>
                </table>

            </div>
            <!-- /.box-body -->
        </div>
    </div>

    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambahkan</button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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

                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>
                <!-- The body of the box -->
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th width="150px">Kode Mata Pelajaran</th>
                            <th>Mata Pelajaran</th>
                            <th width="100px" class="text-center">KKM</th>
                            <th width="100px">Semester</th>
                            <!-- <th>Guru Pengajar</th> -->
                            <th width="100px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($mapel as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $value['kode_mapel'] ?></td>
                                <td><?= $value['nama_mapel'] ?></td>
                                <td class="text-center"><?= $value['kkm'] ?></td>
                                <td><?= $value['smt'] ?></td>
                                <!-- <td><?= $value['nama_guru'] ?></td> -->
                                <td class="text-center">
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_mapel']  ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
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
                echo form_open('mapel/add/' . $kelas['id_kelas']);
                ?>

                <div class="form-group">
                    <label>Kode Mata Pelajaran</label>
                    <input name="kode_mapel" class="form-control" placeholder="Kode Mata Pelajaran">
                </div>

                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input name="nama_mapel" class="form-control" placeholder="Mata Pelajaran">
                </div>

                <div class="form-group">
                    <label>Guru Pengajar</label>
                    <select name="nama_guru" class="form-control">
                        <option value="">--Pilih Guru Pengajar--</option>
                        <?php foreach ($guru as $key => $value) { ?>
                            <option value="<?= $value['nama_guru'] ?>"><?= $value['nama_guru'] ?></option>
                        <?php } ?>

                    </select>
                </div>

                <div class="form-group">
                    <label>KKM</label>
                    <input name="kkm" class="form-control" placeholder="Nilai KKM">
                </div>

                <div class="form-group">
                    <label>Semester</label>
                    <select name="smt" class="form-control">
                        <option value="">--Pilih Semester--</option>
                        <?php foreach ($tp as $key => $value) { ?>
                            <option value="<?= $value['semester'] ?>"><?= $value['semester'] ?></option>
                        <?php } ?>
                        <!-- <option value="1">1</option>
                        <option value="2">2</option> -->
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

<!-- modal delete -->
<?php foreach ($mapel as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_mapel'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Mata Pelajaran</h4>
                </div>
                <div class="modal-body">

                    Apakah Anda Yakin Ingin Menghapus Mata Pelajaran <b><?= $value['nama_mapel'] ?>?</b>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('mapel/delete/' . $kelas['id_kelas'] . '/' . $value['id_mapel']) ?>" class="btn btn-success">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>