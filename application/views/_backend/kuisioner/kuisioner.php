<style>
    .main-header,
    .main-footer,
    .main-sidebar {
        display: none;
    }

    .content-wrapper,
    .main-footer {
        margin-left: 0;
    }
</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/core-admin/core-dist/main/main.css">
<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
<div class="shape shape1"></div>
<div class="shape shape2"></div>
<div class="shape shape3"></div>
<div class="shape shape4"></div>
<div class="container">
    <div class="content-wrapper" style="background:none !important">
        <div class="row">
            <div class="col-lg-6 col-sm-12" style="position: relative;">
                <div class="content hero1">
                    <h4>Hai, Selamat Datang <?php echo $this->session->userdata('user_fullname'); ?> 👋</h4>
                    <h1>Silahkan Mengisi Survey</h1>
                    <br><br><br><br>
                    <img class="img-hero" src="<?php echo base_url(); ?>assets/core-images/hero2.gif" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <section class="content">
                    <div class="row">
                        <div class="pull-right image">
                            <div class="navbar-custom-menu">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown user user-menu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <?php
                                            if ($this->session->userdata('user_photo') == "") {
                                                echo '<img src="' . base_url() . 'upload/user/noimage.png" class="img-circle" alt="User Image">';
                                            } else {
                                                echo '<img src="' . base_url() . 'upload/user/' . $this->session->userdata('user_photo') . '" class="img-circle" alt="User Image">';
                                            }
                                            ?>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="user-header">
                                                <?php
                                                if ($this->session->userdata('user_photo') == "") {
                                                    echo '<img src="' . base_url() . 'upload/user/noimage.png" class="img-circle" alt="User Image">';
                                                } else {
                                                    echo '<img src="' . base_url() . 'upload/user/' . $this->session->userdata('user_photo') . '" class="img-circle" alt="User Image">';
                                                }
                                                ?>
                                                <p>
                                                    <?php echo $this->session->userdata('user_fullname'); ?>
                                                    <small>Member since<br><?php echo $this->session->userdata('user_createtime'); ?></small>
                                                </p>
                                            </li>

                                            <li class="user-footer">
                                                <div class="pull-left">
                                                    <a href="<?php echo site_url('mahasiswa/kuisioner/profile') ?>" class="btn btn-default btn-flat">Profile</a>
                                                </div>
                                                <div class="pull-right">
                                                    <a href="<?php echo site_url('auth/logout') ?>" class="btn btn-google btn-flat">Sign out</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div style="margin-top: 7px;" class="pull-left">
                            <!-- <div class="form-inline">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn-search">
                                            <img src="<?php echo base_url(); ?>assets/core-images/icon-search.png" alt="" width="20">
                                        </button>
                                    </span>
                                    <?php echo form_open("mahasiswa/kuisioner/search") ?>
                                    <input type="text" class="form-control input-search" name="key" placeholder="Cari Survey. . .">

                                    <?php echo form_close(); ?>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <br>
                    <div class="main-box">
                        <div class="boxes box1 col-lg-4">
                            <h2>2</h2>
                            <p>Total Jumlah Survey</p>
                        </div>
                        <div class="boxes box2 col-lg-4">
                            <h2>2</h2>
                            <p>Jumlah Survey Diisi</p>
                        </div>
                    </div>
                    <br><br>
                    <div class="box-body">
                        <?php
                        if ($this->session->flashdata('alert')) {
                            echo $this->session->flashdata('alert');
                            unset($_SESSION['alert']);
                        } ?>
                        <?php
                        if ($this->uri->segment(3) == "search") {
                            echo "Kata Kunci Pencarian : <span class='label label-danger label-inline font-weight-lighter mr-2'>" . $search . "</span><hr style='border: 0.5px solid #d2d6de'>";
                        }
                        ?>
                        <div class="div">
                            <button>Cek Hasil Survey Keseluruhan</button>
                        </div>
                        <br>
                        <table class="table table-hover">
                            <tr>
                                <td width="80%">Isi Survey "EVALUASI KEPUASAN MAHASISWA TERHADAP FASILITAS DAN DOSEN FAKULTAS TEKNIK"</td>
                                <?php if ($cek = $this->session->userdata('user_id')) { ?>
                                    <!-- <td style="text-align: right; color:#1F1F1F">
                                        <p href="" style="color:#1F1F1F; text-decoration: underline;">Selesai</p>
                                    </td> -->
                                    <td style="text-align: right; color:#1F1F1F">
                                        <a href="<?php echo site_url('mahasiswa/kuisioner/kuisioner_kepuasan/') ?>" style="color:#1F1F1F; text-decoration: underline;">Isi Survey</a>
                                    </td>
                                <?php } else { ?>
                                    <td style="text-align: right; color:#1F1F1F">
                                        <a href="<?php echo site_url('mahasiswa/kuisioner/kuisioner_kepuasan/') ?>" style="color:#1F1F1F; text-decoration: underline;">Isi Survey</a>
                                    </td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td width="80%">Isi Survey "EVALUASI KEPENTINGAN MAHASISWA TERHADAP FASILITAS DAN DOSEN FAKULTAS TEKNIK"</td>
                                <?php if ($cek = $this->session->userdata('user_id')) { ?>
                                    <!-- <td style="text-align: right; color:#1F1F1F">
                                        <p href="" style="color:#1F1F1F; text-decoration: underline;">Selesai</p>
                                    </td> -->
                                    <td style="text-align: right; color:#1F1F1F">
                                        <a href="<?php echo site_url('mahasiswa/kuisioner/kuisioner_kepentingan/') ?>" style="color:#1F1F1F; text-decoration: underline;">Isi Survey</a>
                                    </td>
                                <?php } else { ?>
                                    <td style="text-align: right; color:#1F1F1F">
                                        <a href="<?php echo site_url('mahasiswa/kuisioner/kuisioner_kepentingan/') ?>" style="color:#1F1F1F; text-decoration: underline;">Isi Survey</a>
                                    </td>
                                <?php } ?>
                            </tr>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>