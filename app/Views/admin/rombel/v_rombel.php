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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>Rombongan Belajar</th>
                            <th>Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Tahun Angkatan</th>
                            <th>Jumlah Siswa</th>
                            <th width="50px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db = \config\Database::connect();
                        $no = 1;
                        foreach ($rombel as $key => $value) {
                            $jml = $db->table('tbl-siswa')
                                ->where('id_rombel', $value['id_rombel'])
                                ->countAllResults();
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $value['nama_rombel'] ?></td>
                                <td><?= $value['kelas'] ?></td>
                                <td><?= $value['wali_kelas'] ?></td>
                                <td><?= $value['tahun_angkatan'] ?></td>
                                <td>
                                    <p class="label bg-green"><?= $jml ?></p>

                                    <a href="<?= base_url('rombel/detail_rombel/' . $value['id_rombel']) ?>"> Tambah Anggota Rombel</a>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_rombel']  ?>"><i class="fa fa-trash"></i></button>
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
                    <h4 class="modal-title">Tambah Rombongan Belajar</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('rombel/add');
                    ?>

                    <div class="form-group">
                        <label>Rombongan Belajar</label>
                        <input name="nama_rombel" class="form-control" placeholder="Nama Rombongan Belajar" required>
                    </div>

                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_kelas" class="form-control">
                            <option value="">--Pilih Kelas--</option>
                            <?php foreach ($kelas as $key => $value) { ?>
                                <option value="<?= $value['id_kelas'] ?>"><?= $value['kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Wali Kelas</label>
                        <select name="id_guru" class="form-control">
                            <option value="">--Pilih Wali Kelas--</option>
                            <?php foreach ($kelas as $key => $value) { ?>
                                <option value="<?= $value['wali_kelas'] ?>"><?= $value['wali_kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tahun Angkatan</label>
                        <select name="tahun_angkatan" class="form-control">
                            <option value="">--Pilih Tahun Angkatan--</option>
                            <?php for ($i = date('Y'); $i >= date('Y') - 5; $i--) { ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php } ?>
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
    <?php foreach ($rombel as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_rombel'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Hapus Rombongan Belajar</h4>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus Rombongan Belajar <b><?= $value['kelas'] ?>?</b>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                        <a href="<?= base_url('rombel/delete/' . $value['id_rombel']) ?>" class="btn btn-success">Hapus</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php } ?>