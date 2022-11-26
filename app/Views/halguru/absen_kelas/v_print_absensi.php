<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SISPOMU | Print Absensi</title>
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
                        <i class="fa  fa-table"></i> <b>Absensi Kelas</b> TP : <?= $tp['tp'] ?> (<?= $tp['semester'] ?>)
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
                            <th colspan="31" class="text-center"><?= date('M') ?></th>
                            <!-- <th rowspan="2" class="text-center">%</th> -->
                            <!-- <th rowspan="2" class="text-center">Izin</th>
        <th rowspan="2" class="text-center">Alfa</th> -->
                        </tr>
                        <tr class="label-success">
                            <th class="text-sm text-center">1</th>
                            <th class="text-sm text-center">2</th>
                            <th class="text-sm text-center">3</th>
                            <th class="text-sm text-center">4</th>
                            <th class="text-sm text-center">5</th>
                            <th class="text-sm text-center">6</th>
                            <th class="text-sm text-center">7</th>
                            <th class="text-sm text-center">8</th>
                            <th class="text-sm text-center">9</th>
                            <th class="text-sm text-center">10</th>
                            <th class="text-sm text-center">11</th>
                            <th class="text-sm text-center">12</th>
                            <th class="text-sm text-center">13</th>
                            <th class="text-sm text-center">14</th>
                            <th class="text-sm text-center">15</th>
                            <th class="text-sm text-center">16</th>
                            <th class="text-sm text-center">17</th>
                            <th class="text-sm text-center">18</th>
                            <th class="text-sm text-center">19</th>
                            <th class="text-sm text-center">20</th>
                            <th class="text-sm text-center">21</th>
                            <th class="text-sm text-center">22</th>
                            <th class="text-sm text-center">23</th>
                            <th class="text-sm text-center">24</th>
                            <th class="text-sm text-center">25</th>
                            <th class="text-sm text-center">26</th>
                            <th class="text-sm text-center">27</th>
                            <th class="text-sm text-center">28</th>
                            <th class="text-sm text-center">29</th>
                            <th class="text-sm text-center">30</th>
                            <th class="text-sm text-center">31</th>
                        </tr>
                        <?php $no = 1;
                        foreach ($siswa as $key => $value) {
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $value['nis'] ?></td>
                                <td><?= $value['nama_siswa'] ?></td>
                                <td><?php if ($value['h1'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h1'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h1'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h2'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h2'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h2'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h3'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h3'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h3'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h4'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h4'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h4'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h5'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h5'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h5'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h6'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h6'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h6'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h7'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h7'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h7'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h8'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h8'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h8'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h9'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h9'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h9'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h10'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h10'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h10'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h11'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h11'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h11'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h12'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h12'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h12'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h13'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h13'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h13'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h14'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h14'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h14'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h15'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h15'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h15'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h16'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h16'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h16'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h17'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h17'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h17'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h18'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h18'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h18'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h19'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h19'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h19'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h20'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h20'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h20'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h21'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h21'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h21'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h22'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h22'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h22'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h23'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h23'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h23'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h24'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h24'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h24'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h25'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h25'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h25'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h26'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h26'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h26'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h27'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h27'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h27'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h28'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h28'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h28'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h29'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h29'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h29'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h30'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h30'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h30'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>
                                <td><?php if ($value['h31'] == 0) {
                                        echo '<i class="fa fa-times text-danger"></i>';
                                    } elseif ($value['h31'] == 1) {
                                        echo '<i class="fa fa-info text-warning"></i>';
                                    } elseif ($value['h31'] == 2) {
                                        echo '<i class="fa fa-check text-success"></i>';
                                    } ?></td>

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