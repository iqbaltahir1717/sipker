<style>
    .content {
        min-height: 0;
    }
</style>


<div class="content-wrapper">
    <section class="content-header">
        <h1 class="fontPoppins">
            <?php echo strtoupper($title); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
            <?php
            if ($this->uri->segment(3)) {
                echo '<li class="active"><a href="' . site_url('admin/' . $this->uri->segment(2)) . '">' . strtoupper($title) . '</a></li>';
                echo '<li class="active">' . strtoupper($this->uri->segment(3)) . '</li>';
            } else {
                echo '<li class="active">' . strtoupper($title) . '</li>';
            }
            ?>
        </ol>
    </section>
    <section class="content" style="min-height: 0 !important;">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-tools pull-left">
                    <a href="<?php echo site_url('admin/result') ?>" class="btn btn-success btn-flat" title="Refresh halaman">refresh</a>
                </div>
                <div class="box-tools pull-right">

                    <div style="padding-top:10px">
                        Refresh Page in <strong>{elapsed_time}</strong> seconds.</small>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="content" style="padding: 0 15px;">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-tools pull-left">
                    <h4><b>Nilai Kepuasan Pengguna</b></h4>
                </div>
            </div>
            <div class="box-body">
            </div>
        </div>
    </section>


    <section class="content" style="padding: 0 15px;">
        <div class="box collapsed-box">
            <div class="box-header with-border">
                <div class="box-tools pull-left">
                    <h4><b>Nilai Kepuasan Pengguna</b></h4>
                </div>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="box-body" style="display:none">
                <div class="row">
                    <!-- 1 -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="box-body">
                            <h4>1. Nilai Tingkat kepuasan Tangible (Bukti fisik)</h4>
                            <table class="table table-bordered">
                                <tr style="background-color: gray;color:white">
                                    <th style="width: 60px">Kode</th>
                                    <th>Pernyataan</th>
                                    <th>Kepuasan</th>
                                </tr>
                                <?php
                                if ($nilai) {
                                    $nox = 1;
                                    $no = 1;
                                    foreach ($nilai as $key) {
                                ?>
                                        <tr>
                                            <td>T<?php echo $no ?></td>
                                            <td>
                                                <?php echo $key[0] ?>
                                            </td>
                                            <td><?php echo $key[1] ?></td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                } else {
                                    echo '
                            <tr>
                                <td colspan="3">Tidak ada ditemukan</td>
                            </tr>
                            ';
                                }
                                ?>
                                <tr>
                                    <th style="background-color: gray;color:white" colspan="2">Rata-Rata</th>
                                    <th><?php echo $ar_tang ?></th>
                                </tr>

                            </table>
                        </div>
                    </div>

                    <!-- 2 -->
                    <div class="col-lg-6  col-sm-12">
                        <div class="box-body">
                            <h4>2. Nilai Tingkat kepuasan Reliability (Keandalan)</h4>
                            <table class="table table-bordered">
                                <tr style="background-color: gray;color:white">
                                    <th style="width: 60px">Kode</th>
                                    <th>Pernyataan</th>
                                    <th>Kepuasan</th>
                                </tr>
                                <?php
                                if ($nilai2) {
                                    $nox = 1;
                                    $no = 1;
                                    foreach ($nilai2 as $key) {
                                ?>
                                        <tr>
                                            <td>R<?php echo $no ?></td>
                                            <td>
                                                <?php echo $key[0] ?>
                                            </td>
                                            <td><?php echo  $key[1] ?></td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                } else {
                                    echo '
                            <tr>
                                <td colspan="3">Tidak ada ditemukan</td>
                            </tr>
                            ';
                                }
                                ?>
                                <tr>
                                    <th style="background-color: gray;color:white" colspan="2">Rata-Rata</th>
                                    <th><?php echo $ar_reab ?></th>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- 3 -->
                    <div class="col-lg-6  col-sm-12">
                        <div class="box-body">
                            <h4>3. Nilai Tingkat kepuasan Responsiveness (Sikap Tanggap)</h4>
                            <table class="table table-bordered">
                                <tr style="background-color: gray;color:white">
                                    <th style="width: 60px">Kode</th>
                                    <th>Pernyataan</th>
                                    <th>Kepuasan</th>
                                </tr>
                                <?php
                                if ($nilai3) {
                                    $nox = 1;
                                    $no = 1;
                                    foreach ($nilai3 as $key) {
                                ?>
                                        <tr>
                                            <td>RE<?php echo $no ?></td>
                                            <td>
                                                <?php echo $key[0] ?>
                                            </td>
                                            <td><?php echo  $key[1] ?></td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                } else {
                                    echo '
                            <tr>
                                <td colspan="3">Tidak ada ditemukan</td>
                            </tr>
                            ';
                                }
                                ?>
                                <tr>
                                    <th style="background-color: gray;color:white" colspan="2">Rata-Rata</th>
                                    <th><?php echo $ar_resp ?></th>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- 4 -->
                    <div class="col-lg-6  col-sm-12">
                        <div class="box-body">
                            <h4>4. Nilai Tingkat kepuasan Assurance (Jaminan)</h4>
                            <table class="table table-bordered">
                                <tr style="background-color: gray;color:white">
                                    <th style="width: 60px">Kode</th>
                                    <th>Pernyataan</th>
                                    <th>Kepuasan</th>
                                </tr>
                                <?php
                                if ($nilai4) {
                                    $nox = 1;
                                    $no = 1;
                                    foreach ($nilai4 as $key) {
                                ?>
                                        <tr>
                                            <td>A<?php echo $no ?></td>
                                            <td>
                                                <?php echo $key[0] ?>
                                            </td>
                                            <td><?php echo  $key[1] ?></td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                } else {
                                    echo '
                            <tr>
                                <td colspan="3">Tidak ada ditemukan</td>
                            </tr>
                            ';
                                }
                                ?>
                                <tr>
                                    <th style="background-color: gray;color:white" colspan="2">Rata-Rata</th>
                                    <th><?php echo $ar_assr ?></th>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- 5 -->
                    <div class="col-lg-6  col-sm-12">
                        <div class="box-body">
                            <h4>5. Nilai Tingkat kepuasan Empathy (Empati)</h4>
                            <table class="table table-bordered">
                                <tr style="background-color: gray;color:white">
                                    <th style="width: 60px">Kode</th>
                                    <th>Pernyataan</th>
                                    <th>Kepuasan</th>
                                </tr>
                                <?php
                                if ($nilai5) {
                                    $nox = 1;
                                    $no = 1;
                                    foreach ($nilai5 as $key) {
                                ?>
                                        <tr>
                                            <td>E<?php echo $no  ?></td>
                                            <td>
                                                <?php echo $key[0] ?>
                                            </td>
                                            <td><?php echo  $key[1] ?></td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                } else {
                                    echo '
                            <tr>
                                <td colspan="3">Tidak ada ditemukan</td>
                            </tr>
                            ';
                                }
                                ?>
                                <tr>
                                    <th style="background-color: gray;color:white" colspan="2">Rata-Rata</th>
                                    <th><?php echo $ar_empt ?></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content" style="padding: 0 15px;">
        <div class="box collapsed-box">
            <div class="box-header with-border">
                <div class="box-tools pull-left">
                    <h4><b>Nilai Kepentingan Pengguna</b></h4>
                </div>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="box-body" style="display: none;">
                <div class="row">
                    <!-- 1 -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="box-body">
                            <h4>1. Nilai Tingkat Kepentingan Tangible (Bukti fisik)</h4>
                            <table class="table table-bordered">
                                <tr style="background-color: gray;color:white">
                                    <th style="width: 60px">Kode</th>
                                    <th>Pernyataan</th>
                                    <th>lepentingan</th>
                                </tr>
                                <?php
                                if ($nilai_a) {
                                    $nox = 1;
                                    $no = 1;
                                    foreach ($nilai_a as $key) {
                                ?>
                                        <tr>
                                            <td>T<?php echo $no ?></td>
                                            <td>
                                                <?php echo $key[0] ?>
                                            </td>
                                            <td><?php echo $key[1] ?></td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                } else {
                                    echo '
                            <tr>
                                <td colspan="3">Tidak ada ditemukan</td>
                            </tr>
                            ';
                                }
                                ?>
                                <tr>
                                    <th style="background-color: gray;color:white" colspan="2">Rata-Rata</th>
                                    <th><?php echo $ar_tang1 ?></th>
                                </tr>

                            </table>
                        </div>
                    </div>

                    <!-- 2 -->
                    <div class="col-lg-6  col-sm-12">
                        <div class="box-body">
                            <h4>2. Nilai Tingkat Kepentingan Reliability (Keandalan)</h4>
                            <table class="table table-bordered">
                                <tr style="background-color: gray;color:white">
                                    <th style="width: 60px">Kode</th>
                                    <th>Pernyataan</th>
                                    <th>lepentingan</th>
                                </tr>
                                <?php
                                if ($nilai_a2) {
                                    $nox = 1;
                                    $no = 1;
                                    foreach ($nilai_a2 as $key) {
                                ?>
                                        <tr>
                                            <td>R<?php echo $no ?></td>
                                            <td>
                                                <?php echo $key[0] ?>
                                            </td>
                                            <td><?php echo $key[1] ?></td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                } else {
                                    echo '
                            <tr>
                                <td colspan="3">Tidak ada ditemukan</td>
                            </tr>
                            ';
                                }
                                ?>
                                <tr>
                                    <th style="background-color: gray;color:white" colspan="2">Rata-Rata</th>
                                    <th><?php echo $ar_reab1 ?></th>
                                </tr>

                            </table>
                        </div>
                    </div>

                    <!-- 3 -->
                    <div class="col-lg-6  col-sm-12">
                        <div class="box-body">
                            <h4>3. Nilai Tingkat Kepentingan Responsiveness (Sikap Tanggap)</h4>
                            <table class="table table-bordered">
                                <tr style="background-color: gray;color:white">
                                    <th style="width: 60px">Kode</th>
                                    <th>Pernyataan</th>
                                    <th>Kepentingan</th>
                                </tr>
                                <?php
                                if ($nilai_a3) {
                                    $nox = 1;
                                    $no = 1;
                                    foreach ($nilai_a3 as $key) {
                                ?>
                                        <tr>
                                            <td>RE<?php echo $no ?></td>
                                            <td>
                                                <?php echo $key[0] ?>
                                            </td>
                                            <td><?php echo $key[1] ?></td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                } else {
                                    echo '
                            <tr>
                                <td colspan="3">Tidak ada ditemukan</td>
                            </tr>
                            ';
                                }
                                ?>
                                <tr>
                                    <th style="background-color: gray;color:white" colspan="2">Rata-Rata</th>
                                    <th><?php echo $ar_resp1 ?></th>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- 4 -->
                    <div class="col-lg-6  col-sm-12">
                        <div class="box-body">
                            <h4>4. Nilai Tingkat Kepentingan Assurance (Jaminan)</h4>
                            <table class="table table-bordered">
                                <tr style="background-color: gray;color:white">
                                    <th style="width: 60px">Kode</th>
                                    <th>Pernyataan</th>
                                    <th>Kepentingan</th>
                                </tr>
                                <?php
                                if ($nilai_4) {
                                    $nox = 1;
                                    $no = 1;
                                    foreach ($nilai_4 as $key) {
                                ?>
                                        <tr>
                                            <td>A<?php echo $no ?></td>
                                            <td>
                                                <?php echo $key[0] ?>
                                            </td>
                                            <td><?php echo $key[1] ?></td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                } else {
                                    echo '
                            <tr>
                                <td colspan="3">Tidak ada ditemukan</td>
                            </tr>
                            ';
                                }
                                ?>
                                <tr>
                                    <th style="background-color: gray;color:white" colspan="2">Rata-Rata</th>
                                    <th><?php echo $ar_assr1 ?></th>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- 5 -->
                    <div class="col-lg-6  col-sm-12">
                        <div class="box-body">
                            <h4>5. Nilai Tingkat Kepentingan Empathy (Empati)</h4>
                            <table class="table table-bordered">
                                <tr style="background-color: gray;color:white">
                                    <th style="width:   60px">Kode</th>
                                    <th>Pernyataan</th>
                                    <th>Kepentingan</th>
                                </tr>
                                <?php
                                if ($nilai_a5) {
                                    $nox = 1;
                                    $no = 1;
                                    foreach ($nilai_a5 as $key) {
                                ?>
                                        <tr>
                                            <td>E<?php echo $no ?></td>
                                            <td>
                                                <?php echo $key[0] ?>
                                            </td>
                                            <td><?php echo $key[1] ?></td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                } else {
                                    echo '
                            <tr>
                                <td colspan="3">Tidak ada ditemukan</td>
                            </tr>
                            ';
                                }
                                ?>
                                <tr>
                                    <th style="background-color: gray;color:white" colspan="2">Rata-Rata</th>
                                    <th><?php echo $ar_empt1 ?></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content" style="padding: 0 15px 15px 15px;">
        <div class="box collapsed-box">
            <div class="box-header with-border">
                <div class="box-tools pull-left">
                    <h4><b>Nilai Serqual Score</b></h4>
                </div>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="box-body" style="display: none;">
                <div class="row">
                    <!-- 1 -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="box-body">
                            <h4>1. Serqual Score Dimensi Tangible</h4>
                            <table class="table table-bordered">
                                <tr style="background-color: gray;color:white">
                                    <th style="width: 60px">Kode</th>
                                    <th>Kepuasan</th>
                                    <th>Kepentingan</th>
                                    <th>Gap</th>
                                    <th>Persentase</th>
                                </tr>
                                <?php
                                if ($serqual) {
                                    $no = 1;
                                    foreach ($serqual as $key) {
                                ?>
                                        <tr>
                                            <td>T<?php echo $no; ?></td>
                                            <td>
                                                <?php echo $key[0] ?>
                                            </td>
                                            <td><?php echo $key[1] ?></td>
                                            <td>
                                                <?php if ($key[2] < 0) { ?>
                                                    <span class="text-red"><?php echo $key[2] ?></span>
                                                <?php  } else { ?>
                                                    <?php echo $key[2] ?>
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $key[3] ?>%</td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                } else {
                                    echo '
                            <tr>
                                <td colspan="3">Tidak ada ditemukan</td>
                            </tr>
                            ';
                                }
                                ?>
                                <tr>
                                    <th colspan="4" style="background-color: gray;color:white">Rata-Rata</th>
                                    <td>
                                        <?php if ($sr_tang1 >= 75) { ?>
                                            <span class="text-green"><?php echo $sr_tang1 ?>%</span>
                                        <?php } elseif ($sr_tang1 >= 50 || $sr_tang1 < 75) { ?>
                                            <span class="text-orange"><?php echo $sr_tang1 ?>%</span>
                                        <?php } elseif ($sr_tang1 >= 25 || $sr_tang1 < 50) { ?>
                                            <span class="text-black"><?php echo $sr_tang1 ?>%</span>
                                        <?php } elseif ($sr_tang1 >= 0 || $sr_tang1 < 25) { ?>
                                            <span class="text-red"><?php echo $sr_tang1 ?>%</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- 2 -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="box-body">
                            <h4>2. Servqual Score Dimensi Reliability</h4>
                            <table class="table table-bordered">
                                <tr style="background-color: gray;color:white">
                                    <th style="width: 60px">Kode</th>
                                    <th>Kepuasan</th>
                                    <th>Kepentingan</th>
                                    <th>Gap</th>
                                    <th>Persentase</th>
                                </tr>
                                <?php
                                if ($serqual2) {
                                    $no = 1;
                                    foreach ($serqual2 as $key) {
                                ?>
                                        <tr>
                                            <td>R<?php echo $no; ?></td>
                                            <td>
                                                <?php echo $key[0] ?>
                                            </td>
                                            <td><?php echo $key[1] ?></td>
                                            <td>
                                                <?php if ($key[2] < 0) { ?>
                                                    <span class="text-red"><?php echo $key[2] ?></span>
                                                <?php  } else { ?>
                                                    <?php echo $key[2] ?>
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $key[3] ?>%</td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                } else {
                                    echo '
                            <tr>
                                <td colspan="3">Tidak ada ditemukan</td>
                            </tr>
                            ';
                                }
                                ?>

                                <tr>
                                    <th colspan="4" style="background-color: gray;color:white">Rata-Rata</th>
                                    <td>
                                        <?php if ($sr_real1 >= 75) { ?>
                                            <span class="text-green"><?php echo $sr_real1 ?>%</span>
                                        <?php } elseif ($sr_real1 >= 50 || $sr_real1 < 75) { ?>
                                            <span class="text-orange"><?php echo $sr_real1 ?>%</span>
                                        <?php } elseif ($sr_real1 >= 25 || $sr_real1 < 50) { ?>
                                            <span class="text-black"><?php echo $sr_real1 ?>%</span>
                                        <?php } elseif ($sr_real1 >= 0 || $sr_real1 < 25) { ?>
                                            <span class="text-red"><?php echo $sr_real1 ?>%</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- 3 -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="box-body">
                            <h4>3. Serqual Score Dimensi Responsiveness</h4>
                            <table class="table table-bordered">
                                <tr style="background-color: gray;color:white">
                                    <th style="width: 60px">Kode</th>
                                    <th>Kepuasan</th>
                                    <th>Kepentingan</th>
                                    <th>Gap</th>
                                    <th>Persentase</th>
                                </tr>
                                <?php
                                if ($serqual3) {
                                    $no = 1;
                                    foreach ($serqual3 as $key) {
                                ?>
                                        <tr>
                                            <td>RE<?php echo $no; ?></td>
                                            <td>
                                                <?php echo $key[0] ?>
                                            </td>
                                            <td><?php echo $key[1] ?></td>
                                            <td>
                                                <?php if ($key[2] < 0) { ?>
                                                    <span class="text-red"><?php echo $key[2] ?></span>
                                                <?php  } else { ?>
                                                    <?php echo $key[2] ?>
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $key[3] ?>%</td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                } else {
                                    echo '
                            <tr>
                                <td colspan="3">Tidak ada ditemukan</td>
                            </tr>
                            ';
                                }
                                ?>
                                <tr>
                                    <th colspan="4" style="background-color: gray;color:white">Rata-Rata</th>
                                    <td>
                                        <?php if ($sr_resp1 >= 75) { ?>
                                            <span class="text-green"><?php echo $sr_resp1 ?>%</span>
                                        <?php } elseif ($sr_resp1 >= 50 || $sr_resp1 < 75) { ?>
                                            <span class="text-orange"><?php echo $sr_resp1 ?>%</span>
                                        <?php } elseif ($sr_resp1 >= 25 || $sr_resp1 < 50) { ?>
                                            <span class="text-black"><?php echo $sr_resp1 ?>%</span>
                                        <?php } elseif ($sr_resp1 >= 0 || $sr_resp1 < 25) { ?>
                                            <span class="text-red"><?php echo $sr_resp1 ?>%</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- 4 -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="box-body">
                            <h4>4. Serqual Score Dimensi Assurance</h4>
                            <table class="table table-bordered">
                                <tr style="background-color: gray;color:white">
                                    <th style="width: 60px">Kode</th>
                                    <th>Kepuasan</th>
                                    <th>Kepentingan</th>
                                    <th>Gap</th>
                                    <th>Persentase</th>
                                </tr>
                                <?php
                                if ($serqual4) {
                                    $no = 1;
                                    foreach ($serqual4 as $key) {
                                ?>
                                        <tr>
                                            <td>A<?php echo $no; ?></td>
                                            <td>
                                                <?php echo $key[0] ?>
                                            </td>
                                            <td><?php echo $key[1] ?></td>
                                            <td>
                                                <?php if ($key[2] < 0) { ?>
                                                    <span class="text-red"><?php echo $key[2] ?></span>
                                                <?php  } else { ?>
                                                    <?php echo $key[2] ?>
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $key[3] ?>%</td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                } else {
                                    echo '
                            <tr>
                                <td colspan="3">Tidak ada ditemukan</td>
                            </tr>
                            ';
                                }
                                ?>
                                <tr>
                                    <th colspan="4" style="background-color: gray;color:white">Rata-Rata</th>
                                    <td>
                                        <?php if ($sr_assr1 >= 75) { ?>
                                            <span class="text-green"><?php echo $sr_assr1 ?>%</span>
                                        <?php } elseif ($sr_assr1 >= 50 || $sr_assr1 < 75) { ?>
                                            <span class="text-orange"><?php echo $sr_assr1 ?>%</span>
                                        <?php } elseif ($sr_assr1 >= 25 || $sr_assr1 < 50) { ?>
                                            <span class="text-black"><?php echo $sr_assr1 ?>%</span>
                                        <?php } elseif ($sr_assr1 >= 0 || $sr_assr1 < 25) { ?>
                                            <span class="text-red"><?php echo $sr_assr1 ?>%</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- 5 -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="box-body">
                            <h4>5. Serqual Score dimensi Empathy</h4>
                            <table class="table table-bordered">
                                <tr style="background-color: gray;color:white">
                                    <th style="width: 60px">Kode</th>
                                    <th>Kepuasan</th>
                                    <th>Kepentingan</th>
                                    <th>Gap</th>
                                    <th>Persentase</th>
                                </tr>
                                <?php
                                if ($serqual5) {
                                    $no = 1;
                                    foreach ($serqual5 as $key) {
                                ?>
                                        <tr>
                                            <td>E<?php echo $no; ?></td>
                                            <td>
                                                <?php echo $key[0] ?>
                                            </td>
                                            <td><?php echo $key[1] ?></td>
                                            <td>
                                                <?php if ($key[2] < 0) { ?>
                                                    <span class="text-red"><?php echo $key[2] ?></span>
                                                <?php  } else { ?>
                                                    <?php echo $key[2] ?>
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $key[3] ?>%</td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                } else {
                                    echo '
                            <tr>
                                <td colspan="3">Tidak ada ditemukan</td>
                            </tr>
                            ';
                                }
                                ?>
                                <tr>
                                    <th colspan="4" style="background-color: gray;color:white">Rata-Rata</th>
                                    <td>
                                        <?php if ($sr_empt1 >= 75) { ?>
                                            <span class="text-green"><?php echo $sr_empt1 ?>%</span>
                                        <?php } elseif ($sr_empt1 >= 50 || $sr_empt1 < 75) { ?>
                                            <span class="text-orange"><?php echo $sr_empt1 ?>%</span>
                                        <?php } elseif ($sr_empt1 >= 25 || $sr_empt1 < 50) { ?>
                                            <span class="text-black"><?php echo $sr_empt1 ?>%</span>
                                        <?php } elseif ($sr_empt1 >= 0 || $sr_empt1 < 25) { ?>
                                            <span class="text-red"><?php echo $sr_empt1 ?>%</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>