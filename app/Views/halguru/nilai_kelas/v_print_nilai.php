<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SISPOMU | Print Nilai</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style type="text/css" media="print">
        body {
            page-break-before: avoid;
            width: 100%;
            height: 100%;

            zoom: 90%;
        }
    </style>
</head>

<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa  fa-table"></i> <b>Nilai Kelas</b> TP : <?= $tp['tp'] ?> (<?= $tp['semester'] ?>)
                        <small class="pull-right">Tanggal: <?= date('d M Y') ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-xs-6 table-responsive">
                    <table class="table-striped table-responsive">
                        <tr>
                            <td>Kelas</td>
                            <td width="30px" class="text-center">:</td>
                            <td><?= $jadwal['kelas'] ?></td>
                        </tr>
                        <tr>
                            <td>Kode Mapel</td>
                            <td width="30px" class="text-center">:</td>
                            <td><?= $jadwal['kode_mapel'] ?></td>
                        </tr>
                        <tr>
                            <td>Mata Pelajaran</td>
                            <td width="30px" class="text-center">:</td>
                            <td><?= $jadwal['nama_mapel'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-6 table-responsive">
                    <table class="table-striped table-responsive pull-right">
                        <tr>
                            <td>Guru</td>
                            <td width="30px" class="text-center">:</td>
                            <td><?= $jadwal['nama_guru'] ?></td>
                        </tr>
                        <tr>
                            <td>Jadwal</td>
                            <td width="30px" class="text-center">:</td>
                            <td><?= $jadwal['hari'] ?>, <?= $jadwal['waktu'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <br>
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered table-responsive table-xs text-sm">
                        <tr class="label-success">
                            <th rowspan="2" class="text-center">No</th>
                            <th rowspan="2" class="text-center">NIS</th>
                            <th rowspan="2" class="text-center">Nama</th>
                            <th rowspan="2" class="text-center" width="75px">Absensi </th>
                            <th colspan="3" class="text-center">Tugas</th>
                            <th rowspan="2" class="text-center" width="75px">PTS</th>
                            <th rowspan="2" class="text-center" width="75px">PAS</th>
                            <th rowspan="2" class="text-center" width="75px">NA</th>
                            <th rowspan="2" class="text-center" width="75px">Huruf</th>
                        </tr>
                        <tr class="label-success">
                            <th class="text-center" width="75px">Tugas 1</th>
                            <th class="text-center" width="75px">Tugas 2</th>
                            <th class="text-center" width="75px">Tugas 3</th>
                        </tr>
                        <?php $no = 1;
                        foreach ($siswa as $key => $value) {
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $value['nis'] ?></td>
                                <td><?= $value['nama_siswa'] ?></td>
                                <td class="text-center"> <?php
                                                            $absensi = ($value['h1'] +
                                                                $value['h2'] +
                                                                $value['h3'] +
                                                                $value['h4'] +
                                                                $value['h5'] +
                                                                $value['h6'] +
                                                                $value['h7'] +
                                                                $value['h8'] +
                                                                $value['h9'] +
                                                                $value['h10'] +
                                                                $value['h11'] +
                                                                $value['h12'] +
                                                                $value['h13'] +
                                                                $value['h14'] +
                                                                $value['h15'] +
                                                                $value['h16'] +
                                                                $value['h17'] +
                                                                $value['h18'] +
                                                                $value['h19'] +
                                                                $value['h20'] +
                                                                $value['h21'] +
                                                                $value['h22'] +
                                                                $value['h23'] +
                                                                $value['h24'] +
                                                                $value['h25'] +
                                                                $value['h26'] +
                                                                $value['h27'] +
                                                                $value['h28'] +
                                                                $value['h29'] +
                                                                $value['h30'] +
                                                                $value['h31']) / 62 * 100;
                                                            echo number_format($absensi, 0);
                                                            ?></td>
                                <td class="text-center"><?= $value['nilai_tugas1'] ?></td>
                                <td class="text-center"><?= $value['nilai_tugas2'] ?></td>
                                <td class="text-center"><?= $value['nilai_tugas3'] ?></td>
                                <td class="text-center"><?= $value['nilai_pts'] ?></td>
                                <td class="text-center"><?= $value['nilai_pas'] ?></td>
                                <td class="text-center"><?= $value['nilai_akhir'] ?></td>
                                <td class="text-center"><?= $value['nilai_huruf'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-4">

                </div>
                <!-- /.col -->
                <div class="col-xs-4">

                </div>
                <div class="col-xs-4">
                    Cileungsi, <?= date('d M Y') ?> <br>
                    Guru Mapel <br><br><br><br>
                    <?= $jadwal['nama_guru'] ?>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</body>

</html>