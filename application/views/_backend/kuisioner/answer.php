<div class="content-wrapper">
    <section class="content-header">
        <h1 class="fontPoppins">
            <?php echo strtoupper($title); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
            <?php
            if ($this->uri->segment(4)) {
                echo '<li class="active"><a href="' . site_url('admin/' . $this->uri->segment(2)) . '">' . strtoupper($title) . '</a></li>';
                echo '<li class="active">' . strtoupper($this->uri->segment(3)) . '</li>';
            } else {
                echo '<li class="active">' . strtoupper($title) . '</li>';
            }
            ?>

        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-tools pull-left">
                    <div class="form-inline">
                        <select class="form-control" id="rowpage">
                            <?php
                            $rowpage = array(5, 10, 25, 50, 100);
                            for ($r = 0; $r < count($rowpage); $r++) {
                                if ($rowpage[$r] == $this->session->userdata('sess_rowpage')) {
                                    echo '<option value="' . $rowpage[$r] . '" selected>' . $rowpage[$r] . '</option>';
                                } else {
                                    echo '<option value="' . $rowpage[$r] . '">' . $rowpage[$r] . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <div class="input-group margin">
                            <?php echo form_open("admin/answer/search") ?>
                            <input type="text" class="form-control" name="key" placeholder="Masukkan kata kunci pencarian">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-danger btn-flat">cari</button>
                            </span>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="box-tools pull-right">
                    <div style="padding-top:10px">
                        <a href="<?php echo site_url('admin/answer/') ?>" class="btn btn-success btn-flat" title="Refresh halaman">refresh</a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <?php
                if ($this->session->flashdata('alert')) {
                    echo $this->session->flashdata('alert');
                    unset($_SESSION['alert']);
                }

                if ($this->uri->segment(3) == "search") {
                    echo "Kata Kunci Pencarian : <span class='label label-danger label-inline font-weight-lighter mr-2'>" . $search . "</span><hr style='border: 0.5px dashed #d2d6de'>";
                }
                ?>
                <table class="table table-bordered">
                    <tr style="background-color: gray;color:white">
                        <th style="width: 60px">No</th>
                        <th>Indikator</th>
                        <th>Pertanyaan</th>
                        <th style="width: 10%">#aksi</th>
                    </tr>
                    <?php
                    if ($answer) {
                        $nox = 1;
                        $no = 1;
                        foreach ($answer as $key) {

                    ?>
                            <tr>
                                <td><?php echo $no + $numbers; ?></td>
                                <td><?php echo $key->indicator_name; ?></td>
                                <td><?php echo $key->pertanyaan_kuisioner; ?></td>
                                <td>
                                    <button class="btn btn-xs btn-flat btn-primary" data-toggle="modal" data-target="#modalUpdate<?php echo $key->id_kuisioner; ?>">detail</button>
                                </td>

                            </tr>

                            <div class="modal fade" id="modalUpdate<?php echo $key->id_kuisioner ?>" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Pertanyaan "<?php echo $key->pertanyaan_kuisioner; ?>"</h5>
                                            <br>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            A. Kepuasan
                                            <b>Total Pengisi : <?php echo $total; ?></b>
                                            <canvas id="myChart<?php echo $no ?>" width="30" height="20"></canvas>
                                            <br>
                                            B. Kepentingan
                                            <b>Total Pengisi : <?php echo $total2; ?></b>
                                            <canvas id="myChartx<?php echo $no ?>" width="30" height="20"></canvas>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Keluar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

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


                </table>
            </div>
            <div class="box-footer">



                <!-- PAGINATION -->
                <div class="float-right"><?php echo $links; ?></div>

                <!-- COUNT DATA -->
                <?php if ($answer) { ?>
                    <div class="float-left">Tampil <?php echo ($nox + $numbers) . " - " . (count($answer) + $numbers) . " dari " . $total_data; ?> Data</div>
                <?php } else { ?>
                    <div class="float-left">Tampil 0 <?php echo " dari " . $total_data; ?> Data</div>
                <?php } ?>
                <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
            </div>
        </div>
    </section>
</div>

<?php
if ($answer) {
    $noxx = 0;
    foreach ($answer as $key) {
?>
        <script>
            const ctx<?php echo $noxx ?> = document.getElementById('myChart<?php echo $noxx ?>');
            const myChart<?php echo $noxx ?> = new Chart(ctx<?php echo $noxx ?>, {
                type: 'bar',
                data: {
                    labels: ['STP', 'TP', 'C', 'P', 'SP'],
                    datasets: [{
                        label: '',
                        data: [<?php echo $key->total_stp ?>, <?php echo $key->total_tp ?>, <?php echo $key->total_c ?>, <?php echo $key->total_p ?>, <?php echo $key->total_sp ?>],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script> <?php $noxx++;
                }
            }
                    ?>

<?php
if ($answer) {
    $noxxx = 0;
    foreach ($answer as $key) {
?>
        <script>
            const ctxx<?php echo $noxxx ?> = document.getElementById('myChartx<?php echo $noxxx ?>');
            const myChartx<?php echo $noxxx ?> = new Chart(ctxx<?php echo $noxxx ?>, {
                type: 'bar',
                data: {
                    labels: ['STP', 'TP', 'C', 'P', 'SP'],
                    datasets: [{
                        label: '',
                        data: [<?php echo $key->total_stp2 ?>, <?php echo $key->total_tp2 ?>, <?php echo $key->total_c2 ?>, <?php echo $key->total_p2 ?>, <?php echo $key->total_sp2 ?>],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script> <?php $noxxx++;
                }
            }
                    ?>