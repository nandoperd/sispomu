<section class="content-header">
    <h1>
        <a href="<?= base_url('jadwalpelajaran') ?>"><?= $title ?></a>
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
                    <tr>
                        <th width="150px">Wali Kelas</th>
                        <td width="30px">:</td>
                        <td><?= $kelas['wali_kelas'] ?></td>
                    </tr>
                    <tr>
                        <th width="150px">Tahun Pelajaran</th>
                        <td width="30px">:</td>
                        <td><?= $tp_aktif['tp'] ?> (Semester <?= $tp_aktif['semester'] ?>)</td>
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
                            <th width="50px" class="text-center">Smt</th>
                            <th width="100px">Kode Mapel</th>
                            <th>Mata Pelajaran</th>
                            <th class="text-center">KKM</th>
                            <th>Guru</th>
                            <th width="100px">Hari</th>
                            <th>Waktu</th>
                            <th width="100px">Rombel</th>
                            <th width="100px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($jadwal as $key => $value) { ?>
                            <tr>
                                <td width="50px"><?= $no++ ?></td>
                                <td width="50px"><?= $value['smt'] ?></td>
                                <td width="100px"><?= $value['kode_mapel'] ?></td>
                                <td><?= $value['nama_mapel'] ?></td>
                                <td class="text-center"><?= $value['kkm'] ?></td>
                                <td><?= $value['nama_guru'] ?></td>
                                <td><?= $value['hari'] ?></td>
                                <td><?= $value['waktu'] ?></td>
                                <td><?= $value['nama_rombel'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_jadwal']  ?>"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title">Tambah Jadwal Pembelajaran</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('jadwalpelajaran/add/' . $kelas['id_kelas']);
                ?>

                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <select name="id_mapel" class="form-control">
                        <option value="">--Pilih Mata Pelajaran--</option>
                        <?php foreach ($mapel as $key => $value) { ?>
                            <option value="<?= $value['id_mapel'] ?>"><?= $value['smt'] ?>/ <?= $value['kode_mapel'] ?>/ <?= $value['nama_mapel'] ?>/ <?= $value['kkm'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Guru</label>
                    <select name="id_guru" class="form-control">
                        <option value="">--Pilih Guru--</option>
                        <?php foreach ($guru as $key => $value) { ?>
                            <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Rombongan Belajar</label>
                    <select name="id_rombel" class="form-control">
                        <option value="">--Pilih Rombongan Belajar--</option>
                        <?php foreach ($rombel as $key => $value) { ?>
                            <option value="<?= $value['id_rombel'] ?>"><?= $value['nama_rombel'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Pilih Hari</label>
                            <select name="hari" class="form-control">
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jum'at">Jum'at</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Pilih Waktu</label>
                            <select name="waktu" class="form-control">
                                <option value="07:00-08.00">07:00-08.00</option>
                                <option value="08:00-09.00">08:00-09.00</option>
                                <option value="09:00-10.00">09:00-10.00</option>
                                <option value="10:00-11.00">10:00-11.00</option>
                                <option value="11:00-12.00">11:00-12.00</option>
                            </select>
                        </div>
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
</div>

<!-- modal delete -->
<?php foreach ($jadwal as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_jadwal'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Jadwal Pelajaran</h4>
                </div>
                <div class="modal-body">

                    Apakah Anda Yakin Ingin Menghapus Jadwal Pelajaran <b><?= $value['nama_mapel'] ?>?</b>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('jadwalpelajaran/delete/' . $value['id_rombel'] . '/' . $kelas['id_kelas']) ?>" class="btn btn-success">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>