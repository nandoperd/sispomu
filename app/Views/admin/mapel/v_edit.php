<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

                <div class="box-tools pull-right">

                    <!-- <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambahkan</button> -->
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

                <!-- pesan password salah -->
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-warning" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                } ?>

                <?php
                echo form_open('mapel/update/' . $mapel['id_mapel']);
                ?>

                <div class="form-group">
                    <label>Kelas</label>
                    <select name="id_kelas" class="form-control">
                        <option value="<?= $mapel['id_kelas'] ?>"><?= $mapel['kelas'] ?></option>
                        <?php foreach ($kelas as $key => $value) { ?>
                            <option value="<?= $mapel['id_kelas'] ?>"><?= $mapel['kelas'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kode Mata Pelajaran</label>
                    <input name="kode_mapel" value="<?= $mapel['kode_mapel'] ?>" class="form-control" placeholder="Kode Mata Pelajaran" readonly>
                </div>

                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input name="nama_mapel" value="<?= $mapel['nama_mapel'] ?>" class="form-control" placeholder="Mata Pelajaran">
                </div>

            </div>
            <div class="modal-footer">
                <a href="<?= base_url('mapel') ?>" class="btn btn-danger pull-left">Tutup</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            <?php echo form_close() ?>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-sm-3">
    </div>
</div>