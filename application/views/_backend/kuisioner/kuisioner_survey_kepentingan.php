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

    .box-body {
        min-height: 0 !important;
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
            <div class="col-lg-12 col-sm-12">
                <div class="content hero1">
                    <div class="row">
                        <div class="col-lg-1 col-sm-12">
                            <a href="<?php echo site_url('mahasiswa/kuisioner/') ?>">
                                <img src="<?php echo base_url(); ?>assets/core-images/icon_back.png" alt="" width="40">
                            </a>
                        </div>
                        <div class="col-lg-10 col-sm-12">
                            <h4>Oke <?php echo $this->session->userdata('user_fullname'); ?> 😊</h4>
                            <h1>Silahkan Mengisi Survey "EVALUASI KEPENTINGAN MAHASISWA TERHADAP FASILITAS DAN DOSEN FAKULTAS TEKNIK"</h1>
                        </div>
                    </div>
                    <br><br><br>
                    <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
                    <?php echo form_open_multipart("mahasiswa/kuisioner/submit_answer_kepentingan") ?>
                    <?php echo csrf(); ?>
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <section class="content">
                                    <div class="box-body">
                                        <h3>A. Tangible (Bukti Fisik)</h3>
                                        <hr>
                                        <table class="table">
                                            <?php
                                            if ($tangible) {
                                                $no = 1;
                                                $non = 0;
                                                foreach ($tangible as $key) {
                                            ?>
                                                    <tr>
                                                        <td colspan="5"><?php echo $no; ?>. &nbsp;<?php echo $key->pertanyaan_kuisioner; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input value="SP" name="tangible<?php echo $non ?>[]" type="radio">
                                                            <label for="">Sangat Penting</label>
                                                        </td>
                                                        <td>
                                                            <input value="P" name="tangible<?php echo $non ?>[]" type="radio">
                                                            <label for="">Penting</label>
                                                        </td>
                                                        <td>
                                                            <input value="C" name="tangible<?php echo $non ?>[]" type="radio">
                                                            <label for="">Cukup</label>
                                                        </td>
                                                        <td>
                                                            <input value="TP" name="tangible<?php echo $non ?>[]" type="radio">
                                                            <label for="">Tidak Penting</label>
                                                        </td>
                                                        <td>
                                                            <input value="STP" name="tangible<?php echo $non ?>[]" type="radio">
                                                            <label for="">Sangat Tidak Penting</label>
                                                        </td>
                                                        <input type="hidden" name="id_kuisioner[]" value="<?php echo $key->id_kuisioner ?>">
                                                    </tr>
                                            <?php
                                                    $no++;
                                                    $non++;
                                                }
                                            } else {
                                                echo '
                                    <tr>
                                        <td colspan="3">Tidak ada ditemukan</td>
                                    </tr>
                                    ';
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </section>
                                <section class="content">
                                    <div class="box-body">
                                        <h3>B. Reliability (Keandalan)</h3>
                                        <hr>
                                        <table class="table">
                                            <?php
                                            if ($reliability) {
                                                $no = 1;
                                                $non = 0;
                                                foreach ($reliability as $key) {
                                            ?>
                                                    <tr>
                                                        <td colspan="5"><?php echo $no; ?>. &nbsp;<?php echo $key->pertanyaan_kuisioner; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input value="SP" name="reliability<?php echo $non ?>[]" type="radio">
                                                            <label for="">Sangat Puas</label>
                                                        </td>
                                                        <td>
                                                            <input value="P" name="reliability<?php echo $non ?>[]" type="radio">
                                                            <label for="">Puas</label>
                                                        </td>
                                                        <td>
                                                            <input value="C" name="reliability<?php echo $non ?>[]" type="radio">
                                                            <label for="">Cukup</label>
                                                        </td>
                                                        <td>
                                                            <input value="TP" name="reliability<?php echo $non ?>[]" type="radio">
                                                            <label for="">Tidak Puas</label>
                                                        </td>
                                                        <td>
                                                            <input value="STP" name="reliability<?php echo $non ?>[]" type="radio">
                                                            <label for="">Sangat Tidak Puas</label>
                                                        </td>
                                                        <input type="hidden" name="id_kuisioner2[]" value="<?php echo $key->id_kuisioner ?>">
                                                        <input type="hidden" name="user_id" value="6">
                                                    </tr>
                                            <?php
                                                    $no++;
                                                    $non++;
                                                }
                                            } else {
                                                echo '
                                    <tr>
                                        <td colspan="3">Tidak ada Data</td>
                                    </tr>
                                    ';
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </section>
                                <section class="content">
                                    <div class="box-body">
                                        <h3>C. Responsiveness (Sikap Tanggap)</h3>
                                        <hr>
                                        <table class="table">
                                            <?php
                                            if ($responsiveness) {
                                                $no = 1;
                                                $non = 0;
                                                foreach ($responsiveness as $key) {
                                            ?>
                                                    <tr>
                                                        <td colspan="5"><?php echo $no; ?>. &nbsp;<?php echo $key->pertanyaan_kuisioner; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input value="SP" name="responsiveness<?php echo $non ?>[]" type="radio">
                                                            <label for="">Sangat Puas</label>
                                                        </td>
                                                        <td>
                                                            <input value="P" name="responsiveness<?php echo $non ?>[]" type="radio">
                                                            <label for="">Puas</label>
                                                        </td>
                                                        <td>
                                                            <input value="C" name="responsiveness<?php echo $non ?>[]" type="radio">
                                                            <label for="">Cukup</label>
                                                        </td>
                                                        <td>
                                                            <input value="TP" name="responsiveness<?php echo $non ?>[]" type="radio">
                                                            <label for="">Tidak Puas</label>
                                                        </td>
                                                        <td>
                                                            <input value="STP" name="responsiveness<?php echo $non ?>[]" type="radio">
                                                            <label for="">Sangat Tidak Puas</label>
                                                        </td>
                                                        <input type="hidden" name="id_kuisioner3[]" value="<?php echo $key->id_kuisioner ?>">
                                                        <input type="hidden" name="user_id" value="6">
                                                    </tr>
                                            <?php
                                                    $no++;
                                                    $non++;
                                                }
                                            } else {
                                                echo '
                                    <tr>
                                        <td colspan="3">Tidak ada Data</td>
                                    </tr>
                                    ';
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </section>

                                <section class="content">
                                    <div class="box-body">
                                        <h3>D. Assurance (Jaminan)</h3>
                                        <hr>
                                        <table class="table">
                                            <?php
                                            if ($assurance) {
                                                $no = 1;
                                                $non = 0;
                                                foreach ($assurance as $key) {
                                            ?>
                                                    <tr>
                                                        <td colspan="5"><?php echo $no; ?>. &nbsp;<?php echo $key->pertanyaan_kuisioner; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input value="SP" name="assurance<?php echo $non ?>[]" type="radio">
                                                            <label for="">Sangat Puas</label>
                                                        </td>
                                                        <td>
                                                            <input value="P" name="assurance<?php echo $non ?>[]" type="radio">
                                                            <label for="">Puas</label>
                                                        </td>
                                                        <td>
                                                            <input value="C" name="assurance<?php echo $non ?>[]" type="radio">
                                                            <label for="">Cukup</label>
                                                        </td>
                                                        <td>
                                                            <input value="TP" name="assurance<?php echo $non ?>[]" type="radio">
                                                            <label for="">Tidak Puas</label>
                                                        </td>
                                                        <td>
                                                            <input value="STP" name="assurance<?php echo $non ?>[]" type="radio">
                                                            <label for="">Sangat Tidak Puas</label>
                                                        </td>
                                                        <input type="hidden" name="id_kuisioner4[]" value="<?php echo $key->id_kuisioner ?>">
                                                        <input type="hidden" name="user_id" value="6">
                                                    </tr>
                                            <?php
                                                    $no++;
                                                    $non++;
                                                }
                                            } else {
                                                echo '
                                    <tr>
                                        <td colspan="3">Tidak ada Data</td>
                                    </tr>
                                    ';
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </section>

                                <section class="content">
                                    <div class="box-body">
                                        <h3>E. Empathy (Empati)</h3>
                                        <hr>
                                        <table class="table">
                                            <?php
                                            if ($empathy) {
                                                $no = 1;
                                                $non = 0;
                                                foreach ($empathy as $key) {
                                            ?>
                                                    <tr>
                                                        <td colspan="5"><?php echo $no; ?>. &nbsp;<?php echo $key->pertanyaan_kuisioner; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input value="SP" name="empathy<?php echo $non ?>[]" type="radio">
                                                            <label for="">Sangat Puas</label>
                                                        </td>
                                                        <td>
                                                            <input value="P" name="empathy<?php echo $non ?>[]" type="radio">
                                                            <label for="">Puas</label>
                                                        </td>
                                                        <td>
                                                            <input value="C" name="empathy<?php echo $non ?>[]" type="radio">
                                                            <label for="">Cukup</label>
                                                        </td>
                                                        <td>
                                                            <input value="TP" name="empathy<?php echo $non ?>[]" type="radio">
                                                            <label for="">Tidak Puas</label>
                                                        </td>
                                                        <td>
                                                            <input value="STP" name="empathy<?php echo $non ?>[]" type="radio">
                                                            <label for="">Sangat Tidak Puas</label>
                                                        </td>
                                                        <input type="hidden" name="id_kuisioner5[]" value="<?php echo $key->id_kuisioner ?>">
                                                        <input type="hidden" name="user_id" value="6">
                                                    </tr>
                                            <?php
                                                    $no++;
                                                    $non++;
                                                }
                                            } else {
                                                echo '
                                    <tr>
                                        <td colspan="3">Tidak ada Data</td>
                                    </tr>
                                    ';
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <input type="checkbox" name="" id="" onchange="document.getElementById('btnSubmit').disabled = !this.checked;">
                    <span for="" style="color: #616161; display: inline; margin-left: 10px;">Pastikan jawaban survey telah benar <span style="color: red;">*</span></span>
                    <button disabled type="submit" id="btnSubmit" class=" btn btn-primary btn-block" style="margin-top:10px; padding:12px !Important">Submit</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>