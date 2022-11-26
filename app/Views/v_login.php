<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url() ?>">SISPOMU<b>Login</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Silahkan Login</p>

        <!-- validasi login  -->
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
        }

        // pesan berhasil logout
        if (session()->getFlashdata('sukses')) {
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('sukses');
            echo '</div>';
        }

        ?>

        <?php
        echo form_open('auth/cek_login')
        ?>
        <div class="form-group has-feedback">
            <input name="username" class="form-control" placeholder="Username">
            <span class="fa fa-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <select name="level" class="form-control">
                <option value="">--Pilih Level Pengguna--</option>
                <option value="1">Admin</option>
                <option value="5">Kepala Sekolah</option>
                <option value="2">Guru</option>
                <!-- <option value="3">Wali Kelas</option> -->
                <option value="4">Siswa</option>
                <span class="fa fa-user form-control-feedback"></span>
            </select>
        </div>


        <div class="row">
            <!-- <div class="col-xs-8"> -->
            <!-- <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div> -->
            <!-- </div> -->
            <!-- /.col -->
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div>
            <!-- /.col -->
        </div>
        <?php echo form_close() ?>

        <!-- <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a> -->

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->