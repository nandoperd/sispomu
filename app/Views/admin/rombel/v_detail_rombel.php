<section class="content-header">
    <h1>
        <a href="<?= base_url('rombel') ?>">Rombongan Belajar</a> : <?= $rombel['nama_rombel'] ?>
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
                <table class="table">
                    <tr>
                        <th width="150px">Kelas</th>
                        <th width="30px">:</th>
                        <td><?= $rombel['kelas'] ?></td>
                    </tr>
                    <tr>
                        <th width="150px">Tahun Angkatan</th>
                        <th width="30px">:</th>
                        <td><?= $rombel['tahun_angkatan'] ?></td>
                    </tr>
                    <tr>
                        <th width="150px">Jumlah Siswa</th>
                        <th width="30px">:</th>
                        <td><?= $jml ?></td>
                    </tr>
                </table>



                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>

                <table class="table table-bordered">
                    <tr>
                        <th width="50px" class="label-success text-center">No.</th>
                        <th width="120px" class="label-success text-center">NIS</th>
                        <th class="label-success">Nama Siswa</th>
                        <th width="120px" class="text-center label-success">Aksi</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($siswa as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['nis'] ?></td>
                            <td><?= $value['nama_siswa'] ?></td>
                            <td>
                                <a href="<?= base_url('rombel/buang_siswa/' . $value['id_siswa'] . '/' . $rombel['id_rombel']) ?>" class="btn btn-flat btn-sm btn-danger">
                                    <i class="fa fa-trash"> Hapus dari Rombongan Belajar</i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
            <!-- /.box-body -->
        </div>
    </div>

    <!-- modal add -->
    <div class="modal fade" id="add">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Siswa</h4>
                </div>
                <div class="modal-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th class="text-center">Tambah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($siswa_unkelas as $key => $value) { ?>
                                <?php if ($rombel['id_kelas'] == $value['id_kelas']) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['nis'] ?></td>
                                        <td><?= $value['nama_siswa'] ?></td>
                                        <td><?= $value['kelas'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('rombel/rekrut_siswa/' . $value['id_siswa'] . '/' . $rombel['id_rombel']) ?>" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                        <?php } ?>
                                        </td>
                                    </tr>
                                <?php    }    ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->