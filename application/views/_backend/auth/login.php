<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $setting[0]->setting_appname; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="<?php echo base_url(); ?>assets/core-images/<?php echo $setting[0]->setting_logo; ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/core-admin/core-component/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/core-admin/core-dist/css/AdminLTE.min.css">
    <style type="text/css">
        body {
            background: #fff !important;
            color: #24296B;
        }

        .fontPoppins {
            font-family: 'Poppins', sans-serif;
        }

        input {
            border: 1px solid #1f1f1f;
            border-radius: 12px;
            padding: 14px;
            display: block;
            width: 100%;
        }

        .btn-login {
            background: #AECBFB;
            padding: 14px 0;
            border-radius: 12px;
            font-family: Poppins;
            font-style: normal;
            font-weight: normal;
        }

        .box-content2 h1 {
            font-family: Poppins;
            font-style: normal;
            font-weight: 600;
            font-size: 40px;
            color: #1F1F1F;
        }

        .box-content {
            position: relative;
        }

        .box-value {
            position: relative;
            top: 80px;
        }

        .img-hero {
            width: 45vw;
        }

        .shape {
            content: '';
            position: absolute;
            border-radius: 100%;
            ;
            /* z-index: 9999; */
        }

        .shape1 {
            top: -20em;
            left: -16em;
            height: 400px;
            width: 400px;
            background: #E7EFFC
        }

        .shape2 {
            bottom: -10em;
            left: -16em;
            height: 400px;
            width: 400px;
            background: #A0C3FC;
            z-index: 9999;
        }

        .shape3 {
            top: -10em;
            right: -13em;
            height: 400px;
            width: 400px;
            background: #AECBFB
        }

        .shape4 {
            bottom: -19em;
            right: -13em;
            height: 400px;
            width: 400px;
            background: #E8F0FC
        }
    </style>
</head>

<body class="hold-transition login-page fontPoppins" style="height: 100vh; max-height: 100vh !important; overflow: hidden !important">
    <div class="shape shape1"></div>
    <div class="shape shape2"></div>
    <div class="shape shape3"></div>
    <div class="shape shape4"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-6 col-sm-6">
                    <div class="d-flex justify-content-around">
                        <div class="box-content text-center">
                            <div class="box-value">
                                <h3>SISTEM INFORMASI PENILAIAN KINERJA</h3>
                                <p style="font-weight: 700; font-size: 37px;">(SIPKER)</p>
                            </div>
                            <img class="img-hero" src="<?php echo base_url(); ?>assets/core-images/hero.gif">
                        </div>
                    </div>
                    <p class="text-center">
                        <?php echo $setting[0]->setting_owner_name; ?><br>
                        <b>Since @<?php echo date('Y'); ?></b>
                    </p>
                </div>
                <div class="col-lg-6 col-sm-6" style="padding: 100px;">
                    <div class="d-flex align-items-start flex-column">
                        <div class="box-content2 mt-auto">
                            <h4>Hai, Selamat Datang Kembali</h4>
                            <h1>Masuk Sekarang</h1>
                        </div>
                        <br><br><br><br><br><br>
                        <?php echo form_open("auth/validate", "class='login-form'"); ?>
                        <div class="box-content mb-auto">
                            <?php
                            if ($this->session->flashdata('alert')) {
                                echo $this->session->flashdata('alert');
                            }
                            ?>
                            <?php echo csrf(); ?>
                            <div class="form-group has-feedback">
                                <label for="">Username</label><br>
                                <input type="text" placeholder="Input Username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label><br>
                                <input type="password" placeholder="Input Password" name="password">
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-login btn-block ">Sign In</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="<?php echo base_url(); ?>assets/core-admin/core-component/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/core-admin/core-component/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>